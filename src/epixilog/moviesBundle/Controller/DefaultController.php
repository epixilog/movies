<?php

namespace epixilog\moviesBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use epixilog\moviesBundle\Entity\Film;
use epixilog\moviesBundle\Entity\Category;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

    	$categories = $em->getRepository('epixilogmoviesBundle:Category')->getWithCount();
    	$films = $this->getDoctrine()->getRepository('epixilogmoviesBundle:Film')->findAll();
    	$films_count = $this->getDoctrine()->getRepository('epixilogmoviesBundle:Film')->countAll();

        return $this->render('epixilogmoviesBundle:Default:index.html.twig',array(
        																			'films'=>$films,
        																			'films_count'=>$films_count,
        																			'categories'=>$categories
        																			));
    }
}
