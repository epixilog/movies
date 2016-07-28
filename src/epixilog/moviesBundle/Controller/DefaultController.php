<?php

namespace epixilog\moviesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('epixilogmoviesBundle:Default:index.html.twig');
    }
}
