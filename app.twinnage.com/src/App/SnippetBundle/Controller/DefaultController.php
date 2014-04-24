<?php

namespace App\SnippetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\SnippetBundle\Entity;
use Symfony\Component\HttpFoundation\Request;
use App\SnippetBundle\Entity\SnippetRepository;
use App\SnippetBundle\Entity\SnippetAuditRepository;

class DefaultController extends Controller
{

    public function editAction($id, Request $request){
        $repository = $this->getDoctrine()->getRepository('AppSnippetBundle:Snippet');
        $snippet = $repository->find($id);
        $types = array(SnippetRepository::TYPE_TEXT=>\App\SnippetBundle\Entity\SnippetRepository::getTypeName(SnippetRepository::TYPE_TEXT),
            #SnippetRepository::TYPE_IMG=>'Image',
            SnippetRepository::TYPE_CSS=>\App\SnippetBundle\Entity\SnippetRepository::getTypeName(SnippetRepository::TYPE_CSS),
       		SnippetRepository::TYPE_CSS_LINK=>\App\SnippetBundle\Entity\SnippetRepository::getTypeName(SnippetRepository::TYPE_CSS_LINK),
            SnippetRepository::TYPE_JS=>\App\SnippetBundle\Entity\SnippetRepository::getTypeName(SnippetRepository::TYPE_JS),
        	SnippetRepository::TYPE_JS_LINK=>\App\SnippetBundle\Entity\SnippetRepository::getTypeName(SnippetRepository::TYPE_JS_LINK),
        	);

        $form = $this->createFormBuilder($snippet)
            ->add('name', 'text', array('required'=>true))
            ->add('snippet_type', 'choice', array(
            'choices'   => $types,
            'required'  => true,
            'label'     => 'Snippet Type',
            'empty_value' => 'Select One:'))
            ->add('content', 'textarea', array(
            'required'  => true))
            ->getForm();

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                $snippet->setUpdatedAt(new \DateTime());
                $snippet->setUpdatedBy($this->getUser()->getId());

                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($snippet);
                $em->flush();
                $this->saveAudit($snippet);
                return $this->redirect($this->generateUrl('view_snippet',array('id'=>$snippet->getId())));
            }
        }

        return $this->render('AppSnippetBundle:Default:edit.html.twig',
            array('snippet'=>$snippet,'form' => $form->createView()));
    }

    public function readAction($id){
        $repository = $this->getDoctrine()->getRepository('AppSnippetBundle:Snippet');
        $snippet = $repository->find($id);
        $this->snippetTypeName = SnippetRepository::getTypeName($snippet->getSnippetType());
        
        $isHTML = ($snippet->getSnippetType() == SnippetRepository::TYPE_TEXT) ? true : false;
        $baseUrl = 'http://' . $this->get('request')->server->get('HTTP_HOST');

        return $this->render('AppSnippetBundle:Default:read.html.twig',
            array('snippet'=>$snippet, 
            			'snippetTypeName'=>$this->snippetTypeName, 
            			'baseUrl'=>$baseUrl, 
            			'isHTML' => $isHTML
            			));
    }
    
    public function readAuditAction($id){
    	$repository = $this->getDoctrine()->getRepository('AppSnippetBundle:SnippetAudit');
    	$snippetAudit = $repository->find($id);
    	$this->snippetTypeName = SnippetRepository::getTypeName($snippetAudit->getSnippetType());
    
    	$isHTML = true;#($snippetAudit->getSnippetType() == SnippetRepository::TYPE_TEXT) ? true : false;
    	$baseUrl = 'http://' . $this->get('request')->server->get('HTTP_HOST');
    
    	return $this->render('AppSnippetBundle:Default:audit.html.twig',
    			array('snippet'=>$snippetAudit,
    					'snippetTypeName'=>$this->snippetTypeName,
    					'baseUrl'=>$baseUrl,
    					'isHTML' => $isHTML
    			));
    }

	public function addAction(Request $request){
        $types = array(SnippetRepository::TYPE_TEXT=>\App\SnippetBundle\Entity\SnippetRepository::getTypeName(SnippetRepository::TYPE_TEXT),
            #SnippetRepository::TYPE_IMG=>'Image',
            SnippetRepository::TYPE_CSS=>\App\SnippetBundle\Entity\SnippetRepository::getTypeName(SnippetRepository::TYPE_CSS),
       		SnippetRepository::TYPE_CSS_LINK=>\App\SnippetBundle\Entity\SnippetRepository::getTypeName(SnippetRepository::TYPE_CSS_LINK),
            SnippetRepository::TYPE_JS=>\App\SnippetBundle\Entity\SnippetRepository::getTypeName(SnippetRepository::TYPE_JS),
        	SnippetRepository::TYPE_JS_LINK=>\App\SnippetBundle\Entity\SnippetRepository::getTypeName(SnippetRepository::TYPE_JS_LINK),
        	);

        // create a task and give it some dummy data for this example
        $snippet = new \App\SnippetBundle\Entity\Snippet();

        $form = $this->createFormBuilder($snippet)
            ->add('name', 'text', array('required'=>true))
            ->add('snippet_type', 'choice', array(
                'choices'   => $types,
                'required'  => true,
                'label'     => 'Snippet Type',
                'empty_value' => 'Select One:'))
            ->add('content', 'textarea', array(
                'required'  => true))
            ->getForm();

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                $snippet->setAccountId($this->getUser()->getAccountId());
                $snippet->setCreatedAt(new \DateTime());
                $snippet->setCreatedBy($this->getUser()->getId());
                $snippet->setUpdatedAt(new \DateTime());
                $snippet->setUpdatedBy($this->getUser()->getId());
                $snippet->setViews(0);
                $snippet->setIsDeleted(false);

                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($snippet);
                $em->flush();
                
                $this->saveAudit($snippet);
                
                return $this->redirect($this->generateUrl('view_snippet',array('id'=>$snippet->getId())));
            }
        }

        return $this->render('AppSnippetBundle:Default:add.html.twig', array(
            'form' => $form->createView(),
        ));
	}
	
    public function indexAction()
    {
    	$em = $this->getDoctrine()->getManager();
		$query = $em->createQuery(
    		'SELECT p FROM AppSnippetBundle:Snippet p ' .
			'WHERE p.account_id = :account_id ' .
			'and p.is_deleted = :is_deleted ' .
			'ORDER BY p.name ASC'
			)->setParameters(array('account_id'=>$this->getUser()->getAccountId(), 'is_deleted'=>false));
		
		/*
		  $repository = $this->getDoctrine()
		    ->getRepository('AppSnippetBundle:Snippet');
			
			$query = $repository->createQueryBuilder('p')
				->select('p.id')
		        ->from('AppSnippetBundle:Snippet p')
			    ->where('p.account_id = :account_id')
			    ->andWhere('p.is_deleted = :is_deleted')
			    ->setParameters(array('account_id'=>$this->getUser()->getAccountId(), 'is_deleted'=>false))
			    ->orderBy('p.name', 'ASC')
			    ->getQuery();
	    */
		$this->snippets = $query->getResult();
    	
        return $this->render('AppSnippetBundle:Default:index.html.twig', array('snippets'=>$this->snippets));
    }
    
    public function saveAudit($snippet)
    {
    	$snippetAudit = new \App\SnippetBundle\Entity\SnippetAudit();
    	$snippetAudit->setSnippetId($snippet->getid());
    	$snippetAudit->setContent($snippet->getContent());
    	$snippetAudit->setName($snippet->getName());
    	$snippetAudit->setCustomUrlId($snippet->getCustomUrlId());
    	$snippetAudit->setSnippetType($snippet->getSnippetType());
    	$snippetAudit->setSyncStatus(SnippetAuditRepository::SYNC_STATUS_NEW);
    	$snippetAudit->setAccountId($snippet->getAccountId());
    	$snippetAudit->setCreatedAt(new \DateTime());
    	$snippetAudit->setCreatedBy($snippet->getUpdatedBy());
    	$snippetAudit->setUpdatedAt(new \DateTime());
    	$snippetAudit->setUpdatedBy($snippet->getUpdatedBy());
    	$snippetAudit->setIsDeleted(false);
    	
    	$em = $this->getDoctrine()->getEntityManager();
    	$em->persist($snippetAudit);
    	$em->flush();

    	//Make the sync job ignore previous un-synced audits.
    	$query = $em->createQuery(
    			'update AppSnippetBundle:SnippetAudit p ' .
    			'set p.sync_status = :skip_sync_status ' .
    			'WHERE p.account_id = :account_id ' .
    			'and p.id != :id ' .
    			'and p.sync_status = :new_sync_status ' .
    			'and p.is_deleted = :is_deleted ' 
    	)->setParameters(
    			array('skip_sync_status'=>SnippetAuditRepository::SYNC_STATUS_SKIPPED, 
    					'account_id'=>$snippetAudit->getAccountId(),
    					'id'=>$snippetAudit->getId(),
    					'new_sync_status'=>SnippetAuditRepository::SYNC_STATUS_NEW,
    					'is_deleted'=>false
    					))
    	->execute();
    	
    }
}
