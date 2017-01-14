<?php

namespace App\UserInterface\AppBundle\Controller;

use App\UserInterface\AppBundle\Entity\Event;
use App\UserInterface\AppBundle\Form\EventRegisterType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EventController extends Controller
{
    public function indexAction(Request $request)
    {
        return $this->render('AppBundle:Event:index.html.twig');
    }

    public function newEventAction(Request $request, $userId)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->find($userId);
        $event = new Event();
        $form = $this->createForm(EventRegisterType::class, $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $event->setUser($user);
            $em->persist($event);
            $em->flush();

            return $this->redirectToRoute('index_event');
        }

        return $this->render('AppBundle:Event:new.html.twig', [
            'form' => $form->createView()
        ]);
    }
}