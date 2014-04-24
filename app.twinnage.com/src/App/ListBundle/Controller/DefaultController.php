<?php

namespace App\ListBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AppListBundle:Default:index.html.twig', array('name' => $name));
    }
}
