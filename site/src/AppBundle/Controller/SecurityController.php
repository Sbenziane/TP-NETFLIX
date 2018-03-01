<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Symfony\Component\HttpFoundation\Request;


class SecurityController extends Controller

{   /**
    * @Route("/sign-in", name="login")
    * */
  public function loginAction(AuthenticationUtils $authUtils)
  {
    $error = $authUtils->getLastAuthenticationError();
    $lastUsername = $authUtils->getLastUsername();
    return $this->render('security/login.html.twig', [
        'last_username' => $lastUsername,
        'error' => $error
      ]);

  }

   /**
  * @Route("/sign-out", name="logout")
  * */
  public function logoutAction()
  {
    // Nothing to do here
  }

  /**
  * @Route("/sign-up", name="register")
  */
  public function registerAction(Request $request)
  {

    //// Création du formulaire
 $user = new User();

 $form = $this->createForm(UserType:: class, $user);

      //// Validation du formulaire
      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid())
      {
        $movie = $form->getData();
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        return $this->redirectToRoute('movie_list');
      }

      //// Return pour afficher dans le template
      return $this->render('security/register.html.twig', [
        'form' => $form->createView(),
      ]);

    }

}
