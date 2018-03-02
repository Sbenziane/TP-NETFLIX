<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * movie
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
     * @ORM\Column(name="rating", type="float", precision=2, scale=4)
     */
    private $rating;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Genre")
     */
    private $genres;

    /**
     * @var string
     *
     * @ORM\Column(name="linkMovie", type="string", length=255, nullable=true)
     */
    private $linkMovie;

    /**
     * @var string
     *
     * @ORM\Column(name="linkImg", type="string", length=255, nullable=true)
     */
    private $linkImg;

    /**
     * @var string
     *
     * @ORM\Column(name="linkTrailer", type="string", length=255, nullable=true)
     */
    private $linkTrailer;

    /**
     * @var string
     *
     * @ORM\Column(name="titleSaga", type="string", length=255)
     */
    private $titleSaga;

    /**
     * @var string
     *
     * @ORM\Column(name="cover", type="string", length=255)
     */
    private $cover;

    /**
    *@ORM\ManyToOne(targetEntity="AppBundle\Entity\Director", inversedBy="movies")
    */
    private  $director;

   /**
    * @ORM\OneToMany(targetEntity="RoleActor", mappedBy="movie")
    */
    private  $roleActor;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\DescriptionSheet", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private  $descriptionSheet;

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
     * Set linkMovie
     *
     * @param string $linkMovie
     *
     * @return Movie
     */
    public function setLinkMovie($linkMovie)
    {
        $this->linkMovie = $linkMovie;

        return $this;
    }

    /**
     * Get linkMovie
     *
     * @return string
     */
    public function getLinkMovie()
    {
        return $this->linkMovie;
    }


    /**
     * Set linkImg
     *
     * @param string $linkImg
     *
     * @return Movie
     */
    public function setLinkImg($linkImg)
    {
        $this->linkImg = $linkImg;

        return $this;
    }

    /**
     * Get linkImg
     *
     * @return string
     */
    public function getLinkImg()
    {
        return $this->linkImg;
    }

    /**
     * Set linkTrailer
     *
     * @param string $linkTrailer
     *
     * @return Movie
     */
    public function setLink($linkTrailer)
    {
        $this->linkTrailer = $linkTrailer;

        return $this;
    }

    /**
     * Get linkTrailer
     *
     * @return string
     */
    public function getLinkTrailer()
    {
        return $this->linkTrailer;
    }

    /**
     * Set cover
     *
     * @param string $cover
     *
     * @return Movie
     */

    /**
     * Set titleSaga
     *
     * @param string $titleSaga
     *
     * @return Movie
     */
    public function setTitle($titleSaga)
    {
        $this->titleSaga = $titleSaga;

        return $this;
    }

    /**
     * Get titleSaga
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->titleSaga;
    }


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

    /**
     * Set linkTrailer
     *
     * @param string $linkTrailer
     *
     * @return Movie
     */
    public function setLinkTrailer($linkTrailer)
    {
        $this->linkTrailer = $linkTrailer;

        return $this;
    }

    /**
     * Set titleSaga
     *
     * @param string $titleSaga
     *
     * @return Movie
     */
    public function setTitleSaga($titleSaga)
    {
        $this->titleSaga = $titleSaga;

        return $this;
    }

    /**
     * Get titleSaga
     *
     * @return string
     */
    public function getTitleSaga()
    {
        return $this->titleSaga;
    }

    /**
     * Set descriptionSheet
     *
     * @param \AppBundle\Entity\DescriptionSheet $descriptionSheet
     *
     * @return Movie
     */
    public function setDescriptionSheet(\AppBundle\Entity\DescriptionSheet $descriptionSheet = null)
    {
        $this->descriptionSheet = $descriptionSheet;

        return $this;
    }

    /**
     * Get descriptionSheet
     *
     * @return \AppBundle\Entity\DescriptionSheet
     */
    public function getDescriptionSheet()
    {
        return $this->descriptionSheet;
    }

    /**
     * Add genre
     *
     * @param \AppBundle\Entity\Genre $genre
     *
     * @return Movie
     */
    public function addGenre(\AppBundle\Entity\Genre $genre)
    {
        $this->genres[] = $genre;

        return $this;
    }

    /**
     * Remove genre
     *
     * @param \AppBundle\Entity\Genre $genre
     */
    public function removeGenre(\AppBundle\Entity\Genre $genre)
    {
        $this->genres->removeElement($genre);
    }

    /**
     * Get genres
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGenres()
    {
        return $this->genres;
    }
}
