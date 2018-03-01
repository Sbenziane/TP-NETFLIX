<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


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
  public function registerAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
  {

    //// Création du formulaire
 $user = new User();

 $form = $this->createForm(UserType:: class, $user);

      //// Validation du formulaire
      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid())
      {
        $user = $form->getData();
        $em = $this->getDoctrine()->getManager();
        $password = $user->getPassword();
        $user->setPassword($passwordEncoder->encodePassword($user, $password));
        $user->setIsAdmin(false);
        $em->persist($user);
        $em->flush();

        return $this->redirectToRoute('film_list');
      }

      //// Return pour afficher dans le template
      return $this->render('security/register.html.twig', [
        'form' => $form->createView(),
      ]);

    }

    /**
    * @Route("/user/{id}", name="edit", requirements={"id"="\d+"})
    */
    public function editAction(Request $request, $id ,UserPasswordEncoderInterface $passwordEncoder)
    {

      //// Création du formulaire
   $em = $this->getDoctrine()->getManager();
   $user = $em->getRepository(User :: class)
          ->find($id);

   $form = $this->createForm(UserType:: class, $user);

        //// Validation du formulaire
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
          $user = $form->getData();
          $em = $this->getDoctrine()->getManager();
          $password = $user->getPassword();
          $user->setPassword($passwordEncoder->encodePassword($user, $password));
          $user->setIsAdmin(false);
          $em->persist($user);
          $em->flush();

          return $this->redirectToRoute('film_list');
        }

        //// Return pour afficher dans le template
        return $this->render('security/register.html.twig', [
          'form' => $form->createView(),
        ]);

      }


}
