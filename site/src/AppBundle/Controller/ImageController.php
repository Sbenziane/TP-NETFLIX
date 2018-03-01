<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use AppBundle\Entity\Movie;

class ImageController extends Controller
{
    /**
     * @Route("/film/{id}/imageview", name="image_view")
     */
    public function imageViewAction($id)
    {
    $movie = $em->getRepository(Movie:: class)->find($id);
    $filePath = $this->getParameter('image_directory');
    return new BinaryFileResponse();
    }

}
