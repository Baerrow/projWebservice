<?php

namespace GenreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('GenreBundle:Default:index.html.twig', array('name' => $name));
    }
}
