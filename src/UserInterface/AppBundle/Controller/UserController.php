<?php

namespace App\UserInterface\AppBundle\Controller;

use App\UserInterface\AppBundle\Entity\User;
use App\UserInterface\AppBundle\Form\UserRegisterType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    public function indexAction()
    {
        $this->get('userRegistryGenerator');

        return $this->render('AppBundle:User:index.html.twig', [
            'userRegistry' => $this->get('userRegistry')->getContent()
        ]);
    }

    public function registerUserAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserRegisterType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $user->setRole('ROLE_USER');
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('index_user');
        }

        return $this->render('AppBundle:User:new.html.twig', [
            'form' => $form->createView()
        ]);
    }


    public function loginAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('AppBundle:User:login.html.twig', ['error' => $error, 'lastUsername' => $lastUsername]);
    }

    public function checkAction()
    {
    }

    public function logoutAction()
    {
    }
}
