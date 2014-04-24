
<?php 
require('meekrodb.2.1.class.php');
require('RedisWorker.php');

/******SETUP******/
date_default_timezone_set('America/New_York');

DB::$host = getenv('twinnage_db_host');
DB::$user = getenv('twinnage_db_user');
DB::$password = getenv('twinnage_db_password');
DB::$dbName = getenv('twinnage_db_db');

const SYNC_STATUS_ERROR = 0;
const SYNC_STATUS_NEW = 1;
const SYNC_STATUS_PROCESSING = 2;
const SYNC_STATUS_SYNCED = 3;
const SYNC_STATUS_SKIPPED = 4;
/******END SETUP******/

while (true) {
	main();
	sleep(1);
}

function main(){
	
	//Every 30 seconds
	if (date("U") % 30 == 0){
		print date("m/d/Y h:i:s") . " - Sending snippets to Redis...\n";
		//print_r(getenv('VCAP_SERVICES'));
		snippets_to_redis();
		print date("m/d/Y h:i:s") . " - Quitting...\n";
	}
	
	if (date("U") % 60 == 0){
		print date("m/d/Y h:i:s") . " - Updating Views...\n";
		//print_r(getenv('VCAP_SERVICES'));
		update_views();
		print date("m/d/Y h:i:s") . " - Quitting...\n";
	}
}

function snippets_to_redis(){
	$snippets = get_snippets_from_db();
	
	if (count($snippets) > 0){
		//$reply = $redis->rawCommand("NEWCMD $key $param1 $param2"); //Raw command example
		try {
			$redis = new RedisWorker();
		}catch (Exception $e){
			$redis = false;
			print_r($e);
		}
		if ($redis){
			foreach ($snippets as $snippet){
				print "Processing ID {$snippet['id']} with Snippet ID {$snippet['snippet_id']}\n";
				DB::query("update SnippetAudit set sync_status = %i where id = %i", SYNC_STATUS_PROCESSING, $snippet['id']);
				$redis->saveSnippet($snippet);
				print "Snippet saved to Redis.\n";
				DB::query("update SnippetAudit set sync_status = %i where id = %i", SYNC_STATUS_SYNCED, $snippet['id']);
			}
		}
	}else{
		print "No work to do.\n";
	}
}

function get_snippets_from_db(){
	$snippets = DB::query("select * from SnippetAudit where sync_status = %i order by created_at limit 50", SYNC_STATUS_NEW);
	return $snippets;
}

function update_views(){
	$views = get_views_from_redis();
	if (count($views) > 0){
		foreach($views as $idval=>$count){
			list($account_id,$id) = explode(":",$idval);
			if ($account_id && $id){
				$now = date("Y-m-d H:i:s");
				DB::query("update Snippet set views = coalesce(views,0) + %i, last_viewed = cast(%s as datetime) " .
				" where account_id = %i and id = %i and is_deleted = %i ", 
					$count, $now, $account_id, $id, 0);
			}
		}
	}
}

function get_views_from_redis(){
	$redis = new RedisWorker();
	return $redis->getViews();
}

?>