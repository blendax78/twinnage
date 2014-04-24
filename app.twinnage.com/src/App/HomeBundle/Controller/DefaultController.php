<?php

namespace App\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT p FROM AppSnippetBundle:Snippet p ' .
                'WHERE p.account_id = :account_id ' .
                'and p.is_deleted = :is_deleted ' .
                'ORDER BY p.name ASC'
        )->setParameters(array('account_id'=>$this->getUser()->getAccountId(), 'is_deleted'=>false));

        $this->snippets = $query->getResult();
        
        $query = $em->createQuery(
        		'SELECT p FROM AppSnippetBundle:Snippet p ' .
        		'WHERE p.account_id = :account_id ' .
        		'and p.is_deleted = :is_deleted ' .
        		'ORDER BY p.views DESC '
        )->setParameters(array('account_id'=>$this->getUser()->getAccountId(), 'is_deleted'=>false))
        ->setMaxResults(1);
        
        $this->mostViewed = $query->getResult();

        $query = $em->createQuery(
        		'SELECT p FROM AppSnippetBundle:Snippet p ' .
        		'WHERE p.account_id = :account_id ' .
        		'and p.is_deleted = :is_deleted ' .
        		'and p.last_viewed is not null ' .
        		'ORDER BY p.last_viewed DESC '
        )->setParameters(array('account_id'=>$this->getUser()->getAccountId(), 'is_deleted'=>false))
        ->setMaxResults(1);
        
        $this->lastViewed = $query->getResult();
        
        return $this->render('AppHomeBundle:Default:index.html.twig', 
        				array(	'snippets'=>$this->snippets,
        								'last_viewed' => $this->lastViewed[0],
        								'most_viewed' => $this->mostViewed[0]
        						));
    }
}
