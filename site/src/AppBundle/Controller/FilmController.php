<?php
    namespace AppBundle\Controller;

    use AppBundle\Entity\Film;
    use AppBundle\Form\FilmType;
    use AppBundle\Manager\FilmManager;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
    use Symfony\Component\HttpFoundation\Request;


    class FilmController extends Controller
    {
        /**
         * @Route("/films", name="film_list")
         */
        /* On affiche tout les films */
        public function listFilmAffiche()
        {
            $em = $this->getDoctrine()->getManager();
            $films = $em->getRepository(Film :: class)
                ->findAll();
            return $this->render('film/films.html.twig', [
                'films' => $films
            ]);
        }

        /**
         * @Route("/film/{id}", name="film_view", requirements={"id"="\d+"})
         */
        /* On affiche la vue pour un film en fonction de son id */
        public function viewAction($id)
        {
            $em = $this->getDoctrine()->getManager();
            $film = $em->getRepository(Film :: class)
                ->find($id);
            return $this->render('film/film.html.twig' , [
                'film' => $film
            ]);
        }
        /**
         * @Route("/filmLast", name="film_last")
         */
        /* On fait un affichage de film limiter (par date) */
        public function lastFilm(){
            $em = $this->getDoctrine()->getManager();
            $lastFilm = $em->getRepository(Film::class)
                ->findBy(
                    [],
                    ['id' => 'desc'],
                    5,
                    0
                );

            return $this->render('film/films.html.twig' , [
                'films' => $lastFilm
            ]);
        }

        /**
         * @Route("/film/add", name="film_add")
         */
        /*On Creer un formulaire d'ajout pour les film*/
        public function addFilm(Request $request , FilmManager $filmManager)
        {
            $film = new Film();
            $formFilm = $this->createForm(FilmType::class, $film);
            $formFilm->handleRequest($request);

            if ($formFilm->isSubmitted() && $formFilm->isValid())
            {
                $film = $formFilm->getData();
                $filmManager->getCreateArticle($film);
                return $this->redirectToRoute('film_list');
            }

            return $this->render('film/addFilm.html.twig',
                [
                    'formFilm' => $formFilm->createView()
                ]);
        }

        /** * @Route("/film/edit/{id}", name="film_edit") */
        public function EditAction(int $id , Request $request)
        {
            $em = $this->getDoctrine()->getManager();
            $film = $em->getRepository(Film::class)
                ->find($id);

            dump($film);

            $form = $this->createForm(FilmType::class, $film);

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid())
            {
                /** @var Film $film */
                $film = $form->getData();
                $em = $this->getDoctrine()->getManager();
                $em->persist($film);
                $em->flush();
                return $this->redirectToRoute('film_edit', [
                    'id' => $film->getId()
                ]);
            }

            return $this->render('film/editFilm.html.twig',
                [
                    'formEdit' => $form->createView()
                ]);

        }



    }