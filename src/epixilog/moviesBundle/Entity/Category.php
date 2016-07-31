<?php

namespace epixilog\moviesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use epixilog\moviesBundle\Utils\Slug as Slugs;

/**
 * Category
 * @ORM\Entity(repositoryClass="epixilog\moviesBundle\Repository\Category")
 */
class Category
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $label;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $category_films;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->category_films = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set label
     *
     * @param string $label
     *
     * @return Category
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Category
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add categoryFilm
     *
     * @param \epixilog\moviesBundle\Entity\categoryFilm $categoryFilm
     *
     * @return Category
     */
    public function addCategoryFilm(\epixilog\moviesBundle\Entity\categoryFilm $categoryFilm)
    {
        $this->category_films[] = $categoryFilm;

        return $this;
    }

    /**
     * Remove categoryFilm
     *
     * @param \epixilog\moviesBundle\Entity\categoryFilm $categoryFilm
     */
    public function removeCategoryFilm(\epixilog\moviesBundle\Entity\categoryFilm $categoryFilm)
    {
        $this->category_films->removeElement($categoryFilm);
    }

    /**
     * Get categoryFilms
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategoryFilms()
    {
        return $this->category_films;
    }

    /**
     * Set slug
     *
     * @return Category
     */
    public function setSlug()
    {
        $this->slug = Slugs::slugify($this->getLabel());
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return Slugs::slugify($this->getLabel());
    }

}
