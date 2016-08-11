<?php

namespace epixilog\moviesBundle\DataFixtures\ORM;

/*
 *  On a besoin de recourir à l'interface FixtureInterface pour définir une fixture alors on le déclare
 * Si nous n'avions pas mis ce use, on aurait dû taper
 * class LoadingFixtures implements Doctrine\Common\DataFixtures\FixtureInterface pour l'implémentation
 * de l'interface FixtureInterface, ce qui avouons-le n'est pas toujours très pratique, surtout si on
 * veut utiliser plusieurs fois l'objet / interface en question.
 */
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/*
 * Nous aurons besoin de nos entités Genre et Film également, on le déclare donc ici aussi...
 */
use epixilog\moviesBundle\Entity\Category;
use epixilog\moviesBundle\Entity\Film;
use epixilog\moviesBundle\Entity\CategoryFilm;

/*
 * Les fixtures sont des objets qui doivent obligatoireemnt implémenter l'interface FixtureInterface
 */
class LoadingFixtures implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
    
      $data =  array(
                      'film' => array(
                                        array(
                                              "title"=> "Matrix", 
                                              "description" => "Un super film ou neo va se révéler être l'élu. Sa mission sera de sauver l'humanité de la matrix. Mais ... Qu'est ce que la matrice ?")
                      
                                ),
                      'category' => array(
                                      array('label' => 'Action', 'description' => 'Action movies'),
                                      array('label' => 'Police', 'description' => 'Police movies'),
                                      array('label' => 'Sport', 'description' => 'Sport movies'),
                                      array('label' => 'Science Fiction', 'description' => 'Science Fiction movies')
                                  ),
                      'categoryfilm' => array(
                                                array( "film" => 0, "category" => 0 ),
                                                array( "film" => 0, "category" => 1 )
                                      )      
                );
                
      $categories = array();
      $films      = array();
      
      foreach($data['film'] as $film){
             $Film = new Film();
             $Film->setTitle($film['title']);
             $Film->setDescription($film['description']);
             
             $manager->persist($Film);
             array_push($films, $Film);
      }
      
      foreach($data['category'] as $category){
             $Category = new Category();
             $Category->setLabel($category['label']);
             $Category->setDescription($category['description']);
             
             $manager->persist($Category);
             array_push($categories, $Category);
      }
      
      foreach($data['categoryfilm'] as $cf)
      {
              $Cf = new CategoryFilm();
            	$Cf->setCategory($categories[$cf["category"]]);
            	$Cf->setFilm($films[$cf["film"]]);
      
          	  $manager->persist($Cf);
      }
       
   		$manager->flush();
	}
  
}
