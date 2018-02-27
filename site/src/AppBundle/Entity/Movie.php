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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Geere", inversedBy="movies")
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
    *@ORM\ManyToMany(targetEntity="AppBundle\Entity\Tags")
    */
    private $roleActor;
}
