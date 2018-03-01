<?php

namespace AppBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;
use AppBundle\Manager\UserManager;

class CreateAdminCommand extends Command
{
 /**
  * @var UserManager
  */
  private $userManager;

  public function __construct(UserManager $userManager)
  {
    $this->userManager = $userManager;
    parent::__construct();
  }

  protected function configure()
  {
     $this   // le nom de la commande (la partie après "bin/console")
        ->setName('app:create:user')
        // Une description courte, affichée lors de l'éxécution de la       // commande "php bin/console list"
        ->setDescription('Create a user.')
        // La description complète affichée lorsque l'on ajoute       // l'option "--help"
        ->setHelp('This command allow you to create a user')
        ->addArgument( 'lastName', InputArgument::REQUIRED, 'User lastName.')
        ->addArgument( 'firstName', InputArgument::REQUIRED, 'User firstName.')
        ->addArgument( 'email', InputArgument::REQUIRED, 'User email.')
        ->addArgument( 'password', InputArgument::REQUIRED, 'User password.')
        ;
  }

  protected function execute(InputInterface $input, OutputInterface $output)
  {
   $output->writeln([
                'Create User',
                '==============',
                '',
              ]);
  $output->writeln('Whoa!');
  $output->write('You are about to ');
  $output->write('create a user.');
  $this->userManager->createUserFromCommand($input->getArgument('lastName'), $input->getArgument('firstName'), $input->getArgument('email'), $input->getArgument('password'));
  $output->writeln('User successfully created!');
  }

}
