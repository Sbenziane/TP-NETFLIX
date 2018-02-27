<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RoleActor
 *
 * @ORM\Table(name="role_actor")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RoleActorRepository")
 */
class RoleActor
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
     * @ORM\Column(name="role", type="string", length=255)
     */
    private $role;

    /**
    *@ORM\OneToOne(targetEntity="AppBundle\Entity\Actor")
    */
    private $actor;

    /**
    *@ORM\OneToOne(targetEntity="AppBundle\Entity\Movie")
    */
    private $movie;
    
}
