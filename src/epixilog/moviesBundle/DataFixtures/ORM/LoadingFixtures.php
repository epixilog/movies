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
    public function read($file, $delimit = ";"){
               
        if($file != NULL)
        {         
                  $return = array();
                  $fields = array();
                  $i = 0;
                 
                 if (($handle = fopen(__DIR__.'../CSV/'.$file.'.csv', "r")) !== FALSE) 
                 {
                    while (($data = fgetcsv($handle, 1000, $delimit)) !== FALSE) 
                    {  
                        if($i == 0)  // First row
                        {
                              $i++;
                              foreach($data as $field)
                              {
                                  array_push($fields, $field);
                              }
                        } 
                          
                        else     // Data
                        {
                              $datas = array();
                              foreach($fields as $k => $v)
                              {
                                  $datas[$v] = $data[$k];
                              }
                              array_push( $return, $datas );
                        }
                    }
                    
                    fclose($handle);
                    return $return;
                }
        }
        else
        {
            return "Nothing to read";
        }
    }


    public function load(ObjectManager $manager)
    {    
         
      $data = array(
                      'film' => $this->read('film'),
                      'category' => $this->read('category'),
                      'categoryfilm' => $this->read('categoryfilm')
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
