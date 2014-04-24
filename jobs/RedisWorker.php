<?php 
require('predis/autoload.php');
class RedisWorker {
	private $client;
	private $config = array();
	
	public function __construct(){
		try{
			$this->set_config();
			
			$this->client = new Predis\Client(array(
				'host'=> $this->config['host'],
				'password'=> $this->config['password'],
				'port'=> $this->config['port']
		));
			
		}catch(Exception $e){
			$this->client = null;
			print_r($e);
		}
	}
	
	private function set_config(){
		$services_json = json_decode(getenv("VCAP_SERVICES"),true);
		$services = $services_json["redis-2.2"][0]["credentials"];
		$config["host"] = $services["hostname"];
		$config["port"] = $services["port"];
		$config["password"] = $services["password"];
	
		$this->config = $config;
	}
	
	public function getViews(){
		$ids = array();
		if ($this->client){
			for ($i = 0; $i < 50; $i++){
				$result = $this->client->lpop("snippet:viewed");
				if ($result){
					if (!array_key_exists($result,$ids)){
						$ids[$result] = 0;
					}
					$ids[$result] += 1;
				}else{
					//Nothing found.
					break;
				}
			}
		}
		return $ids;
	}
	
	public function saveSnippet($snippet){
		if ($this->client){
			$this->client->hset("snippet:account:{$snippet['account_id']}:id:{$snippet['snippet_id']}", 'id', $snippet['snippet_id']);
			$this->client->hset("snippet:account:{$snippet['account_id']}:id:{$snippet['snippet_id']}", 'audit_id', $snippet['id']);
			$this->client->hset("snippet:account:{$snippet['account_id']}:id:{$snippet['snippet_id']}", 'snippet_type', $snippet['snippet_type']);
			$this->client->hset("snippet:account:{$snippet['account_id']}:id:{$snippet['snippet_id']}", 'content', $snippet['content']);
			
			return true;
		}else{
			return false;
		}
	}
}
?>