<?php

namespace epixilog\moviesBundle\Entity;

/**
 * CategoryFilm
 */
class CategoryFilm
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var float
     */
    private $pertinence;

    /**
     * @var \epixilog\moviesBundle\Entity\Category
     */
    private $category;

    /**
     * @var \epixilog\moviesBundle\Entity\Film
     */
    private $affiliate;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set pertinence
     *
     * @param float $pertinence
     *
     * @return CategoryFilm
     */
    public function setPertinence($pertinence)
    {
        $this->pertinence = $pertinence;

        return $this;
    }

    /**
     * Get pertinence
     *
     * @return float
     */
    public function getPertinence()
    {
        return $this->pertinence;
    }

    /**
     * Set category
     *
     * @param \epixilog\moviesBundle\Entity\Category $category
     *
     * @return CategoryFilm
     */
    public function setCategory(\epixilog\moviesBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \epixilog\moviesBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set affiliate
     *
     * @param \epixilog\moviesBundle\Entity\Film $affiliate
     *
     * @return CategoryFilm
     */
    public function setAffiliate(\epixilog\moviesBundle\Entity\Film $affiliate = null)
    {
        $this->affiliate = $affiliate;

        return $this;
    }

    /**
     * Get affiliate
     *
     * @return \epixilog\moviesBundle\Entity\Film
     */
    public function getAffiliate()
    {
        return $this->affiliate;
    }
}
