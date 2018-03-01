<?php

namespace AppBundle\Manager;

use AppBundle\Entity\Movie;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class MovieManager {
  /** @var EntityManagerInterface */
  private $em;

 public function __construct(EntityManagerInterface $entityManager)
 {
   $this->em = $entityManager;
 }
 public function getMovies()
 {
   return $this->em->getRepository(Movie:: class)
          ->findAll();
  }

  public function getMovie(int $id)
  {
    return $this->em->getRepository(Movie:: class)
           ->find($id);
   }

  public function getCreateForm(Request $request)
  {
    // $movie = new Movie();
    // $form = $this->em->createForm(MovieType::class, $movie);
    //
    // // Validation du formulaire
    // $form->handleRequest($request);
    // if ($form->isSubmitted() && $form->isValid())
    // {
    //   $movie = $form->getData();
    //   $em = $this->getDoctrine()->getManager();
    //   $em->persist($movie);
    //   $em->flush();
    //   return $this->redirectToRoute('movie_list');
    // }
    //
    // // Return pour afficher dans le template
    // return $this->render('/movie/add.html.twig', [
    //   'form' => $form->createView(),
    // ]);
  }

  public function getEditForm()
  {

  }

}
