<?php

namespace epixilog\pagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller; 
use Symfony\Component\Config\Definition\Exception\Exception;



class DefaultController extends Controller
{
    public function indexAction($page)
    {
        try {
          return $this->render('epixilogpagesBundle:Page:'.$page.'.html.twig');
        } catch (\Exception $ex) {
           throw new \Exception('Page '.$page.' not found');
        } 
    }
}
