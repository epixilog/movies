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
    	$labels = array(
    						'Horror',
    						'Adventure',
    						'Sport',
    						'Science Fiction'
    					);

    	foreach($labels as $label){
    		$Category = new Category();
    		$Category->setLabel($label);
    		$Category->setDescription($label.' movies');

    		$manager->persist($Category);
    	}

    	$Action = new Category();
    	$Action->setLabel('Action');
    	$Action->setDescription('Action movies');
    	
		$Police = new Category();
    	$Police->setLabel('Police');
    	$Police->setDescription('Police movies');
    	
        $manager->persist($Action);
        $manager->persist($Police);

    	// On crée le film Matrix !
        $Film = new Film();
        $Film->setTitle("Matrix");
        $Film->setDescription("Un super film ou neo va se révéler être l'élu. Sa mission sera de sauver l'humanité de la matrix. Mais ... Qu'est ce que la matrice ?");

        $manager->persist($Film);

        $cf = new CategoryFilm();
    	$cf->setCategory($Action);
    	$cf->setFilm($Film);

    	$manager->persist($cf);

    	$cf = new CategoryFilm();
    	$cf->setCategory($Police);
    	$cf->setFilm($Film);

    	$manager->persist($cf);

   		$manager->flush();
	}
}
