<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Actor
 *
 * @ORM\Table(name="actor")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ActorRepository")
 */
class Actor
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
     * @ORM\Column(name="lastName", type="string", length=255)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=255)
     */
    private $link;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\RoleActor", mappedBy="actor")
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
     * Set lastName
     *
     * @param string $lastName
     *
     * @return Actor
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Actor
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set link
     *
     * @param string $link
     *
     * @return Actor
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
     * Add roleActor
     *
     * @param \AppBundle\Entity\RoleActor $roleActor
     *
     * @return Actor
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
