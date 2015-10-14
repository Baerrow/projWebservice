<?php

namespace PlaylistBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PlaylistBundle:Default:index.html.twig', array('name' => $name));
    }
}
