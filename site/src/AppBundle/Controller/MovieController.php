<?php
    namespace AppBundle\Controller;

    use AppBundle\Entity\Movie;
    use AppBundle\Form\MovieType;
    use AppBundle\Manager\MovieManager;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
    use Symfony\Component\HttpFoundation\BinaryFileResponse;
    use Symfony\Component\HttpFoundation\Request;


    class MovieController extends Controller
    {
        /**
         * @Route("/movies", name="movie_list")
         */
        /* On affiche tout les movies */
        public function listMovieAffiche()
        {
            $em = $this->getDoctrine()->getManager();
            $movies = $em->getRepository(Movie :: class)
                ->findAll();
            return $this->render('movie/movies.html.twig', [
                'movies' => $movies
            ]);
        }

        /**
         * @Route("/movie/{id}", name="movie_view", requirements={"id"="\d+"})
         */
        /* On affiche la vue pour un movie en fonction de son id */
        public function viewAction($id)
        {
            $em = $this->getDoctrine()->getManager();
            $movie = $em->getRepository(Movie :: class)
                ->find($id);
            return $this->render('movie/movie.html.twig' , [
                'movie' => $movie
            ]);
        }
        /**
         * @Route("/movieLast", name="movie_last")
         */
        /* On fait un affichage de movie limiter (par date) */
        public function lastMovie(){
            $em = $this->getDoctrine()->getManager();
            $lastMovie = $em->getRepository(Movie::class)
                ->findBy(
                    [],
                    ['id' => 'desc'],
                    5,
                    0
                );

            return $this->render('movie/movies.html.twig' , [
                'movies' => $lastMovie
            ]);
        }

        /**
         * @Route("/movie/add", name="movie_add")
         */
        public function addMovie(Request $request , MovieManager $movieManager)
        {
            $movie = new Movie();
            $formMovie = $this->createForm(MovieType::class, $movie);
            $formMovie->handleRequest($request);

            if ($formMovie->isSubmitted() && $formMovie->isValid())
            {
                $movie = $formMovie->getData();
                $movieManager->getCreateArticle($movie);
                return $this->redirectToRoute('movie_list');
            }

            return $this->render('movie/addMovie.html.twig', [
                'formMovie' => $formMovie->createView()
            ]);
        }

        /** * @Route("/movie/edit/{id}", name="movie_edit") */
        public function EditAction(int $id , Request $request)
        {
            $em = $this->getDoctrine()->getManager();
            $movie = $em->getRepository(Movie::class)
                ->find($id);

            //dump($movie);

            $form = $this->createForm(MovieType::class, $movie);

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid())
            {
                /** @var Movie $movie */
                $movie = $form->getData();
                $em = $this->getDoctrine()->getManager();
                $em->persist($movie);
                $em->flush();
                return $this->redirectToRoute('movie_edit', [
                    'id' => $movie->getId()
                ]);
            }

            return $this->render('movie/editMovie.html.twig',
                [
                    'formEdit' => $form->createView()
                ]);

        }

        /**
         * @Route("/movie/{id}/imageView" , name="image_view")
         *
         */
        public function ImageViewAction($id)
        {
            $em = $this->getDoctrine()->getManager();
            /** @var Movie $movie */
            $movie = $em->getRepository(Movie::class)
                ->find($id);
            $filePath = $this->getParameter('images_directory')."/".$movie->getLinkImg();
            return new BinaryFileResponse($filePath);
        }

        public function search($MySearch)
        {
            return recherche($MySearch);
        }

    }