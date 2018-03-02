<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Genre;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AppBundle\Form\GenreType;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use AppBundle\Manager\GenreManager;

class GenreController extends Controller
{

    /**
   * @Route("/admin/genres", name="genre_list")
   */
  public function listAction(GenreManager $manager)
  {
    $genres = $manager->getGenres();
    return $this->render('genre/list.html.twig', [
      'genres' => $genres,
    ]);
  }

  /**
  * @Route("/admin/genre/add/", name="article_add")
  */
  public function addAction(Request $request)
  {
    $genre = new Genre();

    $form = $this->createForm(GenreType:: class, $genre);

         //// Validation du formulaire
         $form->handleRequest($request);
         if ($form->isSubmitted() && $form->isValid())
         {
           $genre = $form->getData();
           $em = $this->getDoctrine()->getManager();
           $em->persist($genre);
           $em->flush();

           return $this->redirectToRoute('genre_list');
         }

         //// Return pour afficher dans le template
         return $this->render('genre/add.html.twig', [
           'form' => $form->createView(),
         ]);
    }

    /**
     * @Route("/admin/genre/edit/{id}", name="genre_edit")
     */
    public function editAction(int $id,Request $request)
    {
      $em = $this->getDoctrine()->getManager();

      $genre = $em->getRepository(Genre:: class)->find($id);

      $form = $this->createForm(GenreType:: class, $genre);


          // Validation du formulaire
          $form->handleRequest($request);
          if ($form->isSubmitted() && $form->isValid())
          {
            $genre = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($genre);
            $em->flush();

            return $this->redirectToRoute('genre_list');
          }

      return $this->render('genre/add.html.twig', [
          'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/delete/genre/{id}", name="genre_delete", requirements={"id"="\d+"}))
     */
    public function deleteAction(Request $request, int $id)
    {
      $em = $this->getDoctrine()->getManager();
      $genre = $em->getRepository(Genre :: class)
          ->find($id);
      $em->remove($genre);
      $em->flush();
      return $this->redirectToRoute('genre_list');
    }

}
