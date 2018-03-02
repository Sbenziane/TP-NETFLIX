<?php

namespace AppBundle\Manager;

use AppBundle\Entity\Genre;
use Doctrine\ORM\EntityManagerInterface;

class GenreManager {
  /** @var EntityManagerInterface */
  private $em;

 public function __construct(EntityManagerInterface $entityManager)
 {
   $this->em = $entityManager;
 }
 public function getGenres()
 {
   return $this->em->getRepository(Genre:: class)
          ->findAll();
  }

  public function getGenre(int $id)
  {
    return $this->em->getRepository(Genre:: class)
           ->find($id);
   }


}
