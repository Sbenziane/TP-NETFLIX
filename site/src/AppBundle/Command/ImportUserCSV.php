<?php

namespace AppBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use AppBundle\Manager\UserManager;

class ImportUserCSV extends Command
{
 /**
  * @var UserManager
  */
  private $userManager;

  public function __construct(UserManager $userManager, UserPasswordEncoderInterface $passwordEncoder)
  {
    $this->userManager = $userManager;
    parent::__construct();
    $this->passwordEncoder = $passwordEncoder;
  }

  protected function configure()
  {
     $this   // le nom de la commande (la partie après "bin/console")
        ->setName('app:import:user')
        // Une description courte, affichée lors de l'éxécution de la       // commande "php bin/console list"
        ->setDescription('Import a user.')
        // La description complète affichée lorsque l'on ajoute       // l'option "--help"
        ->setHelp('This command allow you to import a user');
  }

  protected function execute(InputInterface $input, OutputInterface $output)
  {
   $output->writeln([
                'Create Admin',
                '==============',
                '',
              ]);
  $output->writeln('Whoa!');
  $output->write('You are about to ');
  $output->write('create a admin.');
  $this->userManager->createAdminFromCommand($input->getArgument('lastName'), $input->getArgument('firstName'), $input->getArgument('username'),$input->getArgument('email'), $input->getArgument('password'), $input->getArgument('birthday'), $input->getArgument('country'));
  $output->writeln('Admin successfully created!');
  }

  protected function import(InputInterface $input, OutputInterface $output)
      {
          // Getting php array of data from CSV
          $data = $this->get($input, $output);

          // Getting doctrine manager
          $em = $this->getContainer()->get('doctrine')->getManager();
          // Turning off doctrine default logs queries for saving memory
          $em->getConnection()->getConfiguration()->setSQLLogger(null);

          // Define the size of record, the frequency for persisting the data and the current index of records
          $size = count($data);
          $batchSize = 20;
          $i = 1;

          // Starting progress
          $progress = new ProgressBar($output, $size);
          $progress->start();

          // Processing on each row of data
          foreach($data as $row) {

              $user = $em->getRepository('AppBundle/Entity/User'::class)
                         ->findOneByEmail($row['email']);

  			// If the user doest not exist we create one
              if(!is_object($user)){
                  $user = new User();
                  $user->setEmail($row['email']);
              }

  			// Updating info
              $user->setLastName($row['lastname']);
              $user->setFirstName($row['firstname']);
              $user->setUsername($row['username']);
              $user->setPassword($this->passwordEncoder->encodePassword($user, $row['password']));
              $user->setBirthday(new \DateTime($row['birthday']));
              $user->setCountry($row['country']);
              $user->setIsAdmin(boolval($row['Is_Admin']));

  			// Do stuff here !

  			// Persisting the current user
              $em->persist($user);

  			// Each 20 users persisted we flush everything
              if (($i % $batchSize) === 0) {

                  $em->flush();
  				// Detaches all objects from Doctrine for memory save
                  $em->clear();

  				// Advancing for progress display on console
                  $progress->advance($batchSize);

                  $now = new \DateTime();
                  $output->writeln(' of users imported ... | ' . $now->format('d-m-Y G:i:s'));

              }

              $i++;

          }

  		// Flushing and clear data on queue
          $em->flush();
          $em->clear();

  		// Ending the progress bar process
          $progress->finish();
      }

      protected function get(InputInterface $input, OutputInterface $output)
      {
          // Getting the CSV from filesystem
          $fileName = 'web/uploads/import/users.csv';

          // Using service for converting CSV to PHP Array
          $converter = $this->getContainer()->get('import.csvtoarray');
          $data = $converter->convert($fileName, ';');

          return $data;
      }


}
