<?php

namespace epixilog\moviesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use epixilog\moviesBundle\Utils\Slug as Slugs;

/**
 * Film
 */
class Film
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $category_films;

    /**
     * @var string
     */
    private $slug;

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
     * Set title
     *
     * @param string $title
     *
     * @return Film
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Film
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Film
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Film
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Add categoryFilm
     *
     * @param \epixilog\moviesBundle\Entity\CategoryFilm $categoryFilm
     *
     * @return Film
     */
    public function addCategoryFilm(\epixilog\moviesBundle\Entity\CategoryFilm $categoryFilm)
    {
        $this->category_films[] = $categoryFilm;

        return $this;
    }

    /**
     * Remove categoryFilm
     *
     * @param \epixilog\moviesBundle\Entity\CategoryFilm $categoryFilm
     */
    public function removeCategoryFilm(\epixilog\moviesBundle\Entity\CategoryFilm $categoryFilm)
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
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
        $this->updated_at = $this->created_at = new \DateTime();
    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedAtValue()
    {
        $this->updated_at = new \DateTime();
    }
    


    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Film
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }
    /**
     * @ORM\PreUpdate
     * @ORM\PrePersist
     */
    public function setSlugValue()
    {
        $this->setSlug( Slugs::slugify($this->getTitle()) );
    }
}
