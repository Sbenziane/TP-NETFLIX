<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Film
 *
 * @ORM\Table(name="film")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FilmRepository")
 */
class Film
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
     * @ORM\Column(name="video", type="string", length=20)
     */
    private $video;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank(message="Ajouter une image jpg")
     * @Assert\File(mimeTypes={ "image/jpeg" })
     */
    private $image;

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @var int
     *
     * @ORM\Column(name="saga", type="integer")
     */
    private $saga;

    /**
     * @var string
     *
     * @ORM\Column(name="bandeAnnonce", type="string", length=20)
     */
    private $bandeAnnonce;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="duree", type="time")
     */
    private $duree;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\FicheDescription", cascade="persist")
     */
    private $ficheDescription;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set video
     *
     * @param string $video
     *
     * @return Film
     */
    public function setVideo($video)
    {
        $this->video = $video;

        return $this;
    }

    /**
     * Get video
     *
     * @return string
     */
    public function getVideo()
    {
        return $this->video;
    }




    /**
     * Set saga
     *
     * @param integer $saga
     *
     * @return Film
     */
    public function setSaga($saga)
    {
        $this->saga = $saga;

        return $this;
    }

    /**
     * Get saga
     *
     * @return int
     */
    public function getSaga()
    {
        return $this->saga;
    }

    /**
     * Set bandeAnnonce
     *
     * @param string $bandeAnnonce
     *
     * @return Film
     */
    public function setBandeAnnonce($bandeAnnonce)
    {
        $this->bandeAnnonce = $bandeAnnonce;

        return $this;
    }

    /**
     * Get bandeAnnonce
     *
     * @return string
     */
    public function getBandeAnnonce()
    {
        return $this->bandeAnnonce;
    }

    /**
     * Set duree
     *
     * @param \DateTime $duree
     *
     * @return Film
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get duree
     *
     * @return \dateTime
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set FicheDescription
     *
     * @param \int $FicheDescription
     *
     * @return Film
     */
    public function setFicheDescription($ficheDescription)
    {
        $this->ficheDescription = $ficheDescription;

        return $this;
    }

    /**
     * Get FicheDescription
     *
     * @return \int
     */
    public function getFicheDescription()
    {
        return $this->ficheDescription;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Film
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \dateTime
     */
    public function getDate()
    {
        return $this->date;
    }
}

