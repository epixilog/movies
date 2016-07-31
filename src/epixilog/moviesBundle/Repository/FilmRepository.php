<?php

namespace epixilog\moviesBundle\Repository;

/**
 * FilmRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class FilmRepository extends \Doctrine\ORM\EntityRepository
{
	public function countAll(){
		$qb = $this->createQueryBuilder('f')
					->select('count(f.id)')
					->getQuery();
		return $qb->getSingleScalarResult();
	}

	public function getByCategory($category_id){
		$qb = $this->createQueryBuilder('f')
					->leftJoin('f.category_films', 'cf')
					->innerJoin('cf.category', 'c')
					->where('c.id = :cat_id')
					->setParameter('cat_id', $category_id)
					->getQuery();

		return $qb->getResult();
	}

}
