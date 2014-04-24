<?php

namespace App\CustomUrlBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AppCustomUrlBundle:Default:index.html.twig', array('name' => $name));
    }
}
