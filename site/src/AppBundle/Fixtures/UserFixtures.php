<?php
namespace AppBundle\Fixtures;

use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{

	/** @var UserPasswordEncoderInterface */
  private $passwordEncoder;

	public function __construct(UserPasswordEncoderInterface $passwordEncoder)
	{
		$this->passwordEncoder = $passwordEncoder;
	}

	public function load(ObjectManager $manager)
	{

	$user = new User();

	$user
		->setLastName('lastName #1')
		->setFirstName( 'firstName #1')
    ->setUserName('user')
		->setEmail('user@test.fr')
		->setPassword($this->passwordEncoder->encodePassword($user, 'user'))
		->setBirthday(new \DateTime())
    ->setCountry('France')
		->setIsAdmin(false);

		$admin = new User();

		$admin
			->setLastName('lastName #2')
			->setFirstName( 'firstName #3')
	    ->setUserName('admin')
				->setEmail('admin@test.fr')
			->setPassword($this->passwordEncoder->encodePassword($user, 'admin'))
			->setBirthday(new \DateTime())
	    ->setCountry('France')
			->setIsAdmin(false);

	$manager->persist($user);
	$manager->persist($admin);

	$manager->flush();
	}
}
