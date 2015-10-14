<?php

namespace AuthorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AuthorBundle:Default:index.html.twig', array('name' => $name));
    }
}
