<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Movie
 *
 * @ORM\Table(name="movie")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MovieRepository")
 */
class Movie
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="release_at", type="date")
     */
    private $releaseAt;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=255)
     */
    private $language;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="length", type="time")
     */
    private $length;

    /**
     * @var string
     *
     * @ORM\Column(name="rating", type="float", precision=2, scale=4)
     */
    private $rating;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Genre", inversedBy="movies")
     */
    private $genre;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=255)
     */
    private $link;

    /**
     * @var string
     *
     * @ORM\Column(name="cover", type="string", length=255)
     */
    private $cover;

    /**
    *@ORM\OneToOne(targetEntity="AppBundle\Entity\Director")
    */
   private $director;

   /**
    * @ORM\OneToMany(targetEntity="RoleActor", mappedBy="movie")
    */
    private $roleActor;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->roleActor = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return Movie
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Movie
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
     * Set releaseAt
     *
     * @param \DateTime $releaseAt
     *
     * @return Movie
     */
    public function setReleaseAt($releaseAt)
    {
        $this->releaseAt = $releaseAt;

        return $this;
    }

    /**
     * Get releaseAt
     *
     * @return \DateTime
     */
    public function getReleaseAt()
    {
        return $this->releaseAt;
    }

    /**
     * Set language
     *
     * @param string $language
     *
     * @return Movie
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set length
     *
     * @param \DateTime $length
     *
     * @return Movie
     */
    public function setLength($length)
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Get length
     *
     * @return \DateTime
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Set rating
     *
     * @param float $rating
     *
     * @return Movie
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get rating
     *
     * @return float
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set link
     *
     * @param string $link
     *
     * @return Movie
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set cover
     *
     * @param string $cover
     *
     * @return Movie
     */
    public function setCover($cover)
    {
        $this->cover = $cover;

        return $this;
    }

    /**
     * Get cover
     *
     * @return string
     */
    public function getCover()
    {
        return $this->cover;
    }

    /**
     * Set genre
     *
     * @param \AppBundle\Entity\Genre $genre
     *
     * @return Movie
     */
    public function setGenre(\AppBundle\Entity\Genre $genre = null)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return \AppBundle\Entity\Genre
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set director
     *
     * @param \AppBundle\Entity\Director $director
     *
     * @return Movie
     */
    public function setDirector(\AppBundle\Entity\Director $director = null)
    {
        $this->director = $director;

        return $this;
    }

    /**
     * Get director
     *
     * @return \AppBundle\Entity\Director
     */
    public function getDirector()
    {
        return $this->director;
    }

    /**
     * Add roleActor
     *
     * @param \AppBundle\Entity\RoleActor $roleActor
     *
     * @return Movie
     */
    public function addRoleActor(\AppBundle\Entity\RoleActor $roleActor)
    {
        $this->roleActor[] = $roleActor;

        return $this;
    }

    /**
     * Remove roleActor
     *
     * @param \AppBundle\Entity\RoleActor $roleActor
     */
    public function removeRoleActor(\AppBundle\Entity\RoleActor $roleActor)
    {
        $this->roleActor->removeElement($roleActor);
    }

    /**
     * Get roleActor
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRoleActor()
    {
        return $this->roleActor;
    }
}
