<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use AppBundle\Manager\UserManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    /**
     * @Route("/admin/users", name="user_list")
     */
    public function listAction(Request $request)
    {
      $em = $this->getDoctrine()->getManager();
      $users = $em->getRepository(User :: class)
          ->findAll();
      return $this->render('user/list.html.twig', [
          'users' => $users
      ]);
    }

    /**
     * @Route("/admin/delete/user/{id}", name="user_delete", requirements={"id"="\d+"}))
     */
    public function deleteAction(Request $request, int $id)
    {
      $em = $this->getDoctrine()->getManager();
      $user = $em->getRepository(User :: class)
          ->find($id);
      $em->remove($user);
      $em->flush();
      return $this->redirectToRoute('user_list');
    }
}
