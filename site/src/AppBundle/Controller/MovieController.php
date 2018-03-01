<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Movie;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AppBundle\Form\MovieType;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use AppBundle\Manager\MovieManager;

class MovieController extends Controller
{

    /**
   * @Route("/movies", name="movie_list")
   */
  public function listAction(MovieManager $manager)
  {
    $movies = $manager->getMovies();
    return $this->render('movie/list.html.twig', [
      'movies' => $movies,
    ]);
  }

  /**
 * @Route("/movie/view/{id}", name="movie_view", requirements={"id"="\d+"})
 */
  public function viewMovie(int $id)
  {
    $em = $this->getDoctrine()->getManager();
    $movie = $em->getRepository(Movie:: class)->find($id);

    if ($movie === null)
    {
      throw new NotFoundHttpException( '404, Article not found.');
    }
    return $this->render('movie/view.html.twig', [
      'movie' => $movie,
  ]);
}

  /**
  * @Route("/movie/add/", name="movie_add")
  */
  public function addAction(Request $request)
  {
  //  $form = $manager->getCreateForm($request);

    // ---------------------------------------------------------------------
    //
    //// Création du formulaire
 $movie = new Movie();

 $form = $this->createForm(MovieType:: class, $movie);

      //// Validation du formulaire
      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid())
      {
        $movie = $form->getData();
        $em = $this->getDoctrine()->getManager();
        $em->persist($movie);
        $em->flush();

        return $this->redirectToRoute('movie_list');
      }

      //// Return pour afficher dans le template
      return $this->render('movie/add.html.twig', [
        'form' => $form->createView(),
      ]);

    }

    /**
     * @Route("/movie/edit/{id}", name="movie_edit")
     */
    public function editAction(int $id,Request $request)
    {
      $em = $this->getDoctrine()->getManager();

      $movie = $em->getRepository(Movie:: class)->find($id);

      $form = $this->createForm(MovieType:: class, $movie);

      // $form = $this->createFormBuilder($article)
      //     ->add('name', TextType::class)
      //     ->add('description', TextareaType::class)
      //     ->add('price', NumberType::class)
      //     ->add('label', TextareaType::class)
      //     ->add('save', SubmitType::class, ['label' => 'Modifier un article'])
      //     ->getForm();

          // Validation du formulaire
          $form->handleRequest($request);
          if ($form->isSubmitted() && $form->isValid())
          {
            $article = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($movie);
            $em->flush();

            return $this->redirectToRoute('movie_edit',[
              'id' => $id,
            ]);
          }

      return $this->render('movie/add.html.twig', [
          'form' => $form->createView(),
        ]);
    }
}
