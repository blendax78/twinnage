<?php

namespace Api\SnippetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\SnippetBundle\Entity\SnippetRepository;
use App\UserBundle\Entity\UserRepository;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ApiSnippetBundle:Default:index.html.twig', array());
    }
    
    public function getAction($id, $key)
    {
    	$userRepository = $repository = $this->getDoctrine()->getRepository('AppUserBundle:User');
    	$user = $userRepository->findOneBy(array('api_key' => $key,'is_deleted'=>false));

    	if ($user) {
    	    	$em = $this->getDoctrine()->getManager();
		    	$query = $em->createQuery(
		    			'SELECT s FROM AppSnippetBundle:Snippet s ' .
		    			'WHERE s.account_id = :account_id ' .
		    			'AND s.id = :id ' .
		    			'and s.is_deleted = :is_deleted '
		    	)->setParameters(array('account_id'=>$user->getAccountId(), 'id'=>$id, 'is_deleted'=>false))
		    	->setMaxResults(1);
		    	
		    	try {
		    		// The Query::getSingleResult() method throws an exception
		    		// if there is no record matching the criteria.
		    		$snippet = $query->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
		    	#Add view logic here
		    	} catch (NoResultException $e) {
		    		throw new Exception(sprintf('Failed while fetching snippet.'), null, 0, $e);
		    	}
		    	
		    	if ($snippet){
		    		return $this->render('ApiSnippetBundle:Default:json.html.twig', array('object'=>$snippet[0]));		    		
		    	}else{
		    		return $this->render('ApiSnippetBundle:Default:json.html.twig', array('object'=>''));		    		
		    	}

	    	} else {
	    		return $this->render('ApiSnippetBundle:Default:index.html.twig', array());
	    	}
    }
    
    public function contentAction($account_id, $id)
    {
        header('Access-Control-Allow-Origin: *'); #For dev purposes
    	$em = $this->getDoctrine()->getManager();
    	$query = $em->createQuery(
    			'SELECT s FROM AppSnippetBundle:Snippet s ' .
    			'WHERE s.account_id = :account_id ' .
    			'AND s.id = :id ' .
    			'and s.is_deleted = :is_deleted '
    	)->setParameters(array('account_id'=>$account_id, 'id'=>$id, 'is_deleted'=>false))
    	->setMaxResults(1);
    	
    	try {
    		$snippet = $query->getResult();

    	#Add view logic here
    	} catch (NoResultException $e) {
    		throw new Exception(sprintf('Failed while fetching snippet.'), null, 0, $e);
    	}
    	
    	if ($snippet){
    		return $this->render('ApiSnippetBundle:Default:content.html.twig', array('content'=>$snippet[0]->getContent()));
    	}else{
    		return $this->render('ApiSnippetBundle:Default:content.html.twig', array('content'=>''));
    	}
    }

    public function allAction($account_id, $start = 0, $stop = 10){
        header('Access-Control-Allow-Origin: *'); #For dev purposes
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
                'SELECT s FROM AppSnippetBundle:Snippet s ' .
                'WHERE s.account_id = :account_id ' .
                'and s.is_deleted = :is_deleted '
        )->setParameters(array('account_id'=>$account_id, 'is_deleted'=>false))
        ->setFirstResult($start)
        ->setMaxResults($stop);
        
        try {
            $snippets = $query->getArrayResult();

        #Add view logic here
        } catch (NoResultException $e) {
            throw new Exception(sprintf('Failed while fetching snippet.'), null, 0, $e);
        }

        return $this->render('ApiSnippetBundle:Default:json.html.twig', array('object'=>$snippets));
    }
    
    public function listAction($account_id, $ids){
    	header('Access-Control-Allow-Origin: *'); #For dev purposes
    	$id_array = explode(",",$ids);
    	$em = $this->getDoctrine()->getManager();
    	$query = $em->createQuery(
    			'SELECT s FROM AppSnippetBundle:Snippet s ' .
    			'WHERE s.account_id = :account_id ' .
    			'AND s.id in (:ids) ' .
    			'and s.is_deleted = :is_deleted '
    	)->setParameters(array('account_id'=>$account_id, 'ids'=>$id_array, 'is_deleted'=>false));

    	try {
    		// The Query::getSingleResult() method throws an exception
    		// if there is no record matching the criteria.
    		$snippets = $query->getArrayResult();

    		#Add view logic here
    	} catch (NoResultException $e) {
    		throw new Exception(sprintf('Failed while fetching snippet.'), null, 0, $e);
    	}
    	return $this->render('ApiSnippetBundle:Default:json.html.twig', array('object'=>$snippets));
    }
    
    public function getAuditAction($account_id, $snippet_id){
    	$em = $this->getDoctrine()->getManager();
    	$query = $em->createQuery(
    			'SELECT p FROM AppSnippetBundle:SnippetAudit p ' .
    			'WHERE p.account_id = :account_id ' .
    			'AND p.snippet_id = :snippet_id ' .
    			'AND p.is_deleted = :is_deleted ' .
    			'ORDER BY p.created_at DESC'
    	)->setParameters(array('account_id'=>$account_id, 'snippet_id'=>$snippet_id,  'is_deleted'=>false));
    	$snippetAudits = $query->getArrayResult();
    	return $this->render('ApiSnippetBundle:Default:json.html.twig', array('object'=>$snippetAudits));
    }
}
