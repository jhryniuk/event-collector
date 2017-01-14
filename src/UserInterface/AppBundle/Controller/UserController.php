<?php

namespace App\UserInterface\AppBundle\Controller;

use App\UserInterface\AppBundle\Entity\User;
use App\UserInterface\AppBundle\Form\UserRegisterType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    public function indexAction(Request $request)
    {
        $this->get('userRegistryGenerator');

        return $this->render('AppBundle:User:index.html.twig', [
            'userRegistry' => $this->get('userRegistry')
        ]);
    }

    public function newUserAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserRegisterType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('index_user');
        }

        return $this->render('AppBundle:User:new.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
