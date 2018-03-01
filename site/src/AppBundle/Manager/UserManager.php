<?php

namespace AppBundle\Manager;

use AppBundle\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserManager {

  /** @var EntityManagerInterface */
  private $em;

  /** @var UserPasswordEncoderInterface */
  private $passwordEncoder;

 public function __construct(EntityManagerInterface $entityManager, UserPasswordEncoderInterface $passwordEncoder)
 {
   $this->em = $entityManager;
   $this->passwordEncoder = $passwordEncoder;
 }

  public function createAdminFromCommand($lastName ,$firstName, $username, $email, $password, $birthday, $country)
  {
    $user = new User();
    $password = $this->passwordEncoder->encodePassword($user, $password);
    $user
       ->setLastName($lastName)
       ->setFirstName($firstName)
       ->setUsername($username)
       ->setEmail($email)
       ->setPassword($password)
       ->setBirthday($birthday)
       ->setCountry($country)
       ->setIsAdmin(true);
    $this->em->persist($user);
    $this->em->flush();
  }

}
