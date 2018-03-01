<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DescriptionSheet
 *
 * @ORM\Table(name="description_sheet")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DescriptionSheetRepository")
 */
class DescriptionSheet
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

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
     * @ORM\Column(name="duration", type="time")
     */
    private $duration;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Movie")
     */
    private $DescriptionSheet;

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
     * Set title
     *
     * @param string $title
     *
     * @return DescriptionSheet
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
     * Set releaseAt
     *
     * @param \DateTime $releaseAt
     *
     * @return DescriptionSheet
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
     * @return DescriptionSheet
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
     * Set duration
     *
     * @param \DateTime $duration
     *
     * @return DescriptionSheet
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return \DateTime
     */
    public function getDuration()
    {
        return $this->duration;
    }
}

