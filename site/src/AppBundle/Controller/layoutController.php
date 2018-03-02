<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
class layoutController extends Controller
{
    public function MenuAction()
    {
        $menus = [
            [
                'path' => 'fiche_list_2',
                'label' => 'Accueil'

            ], [
                'path' => 'movie_list',
                'label' => 'movie'
            ],
        ];

        return $this->render('menu.html.twig', [
            'menus' => $menus
        ]);
    }
}