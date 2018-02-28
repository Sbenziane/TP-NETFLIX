<?php

namespace AppBundle\Controller;

use AppBundle\Entity\FicheDescription;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class FicheController extends Controller
{
    /**
     * @Route("/fiches", name="fiche_list_2")
     */
    public function listAffiche()
    {
        $em = $this->getDoctrine()->getManager();
        $fiches = $em->getRepository(FicheDescription:: class)
            ->findAll();
        return $this->render('fiche/Lesfiches.html.twig' , [
            'fiches' => $fiches
        ]);
    }


    /**
     * @Route("/fiche/{id}", name="fiche_view", requirements={"id"="\d+"})
     */
    public function viewAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $fiche = $em->getRepository(FicheDescription:: class)
            ->find($id);
        return $this->render('fiche/fiche.html.twig' , [
            'fiche' => $fiche
        ]);
    }
}