<?php

namespace App\UserInterface\AppBundle\Controller;

use App\UserInterface\AppBundle\Entity\Event;
use App\UserInterface\AppBundle\Form\EventRegisterType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EventController extends Controller
{
    public function indexAction()
    {
        return $this->render('AppBundle:Event:index.html.twig');
    }

    public function newEventAction(Request $request)
    {
        $event = new Event();
        $form = $this->createForm(EventRegisterType::class, $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $user = $this->getUser();
            $event->setUser($user);
            $em->persist($event);
            $em->flush();

            return $this->redirectToRoute('index_event');
        }

        return $this->render('AppBundle:Event:new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function myEventsAction()
    {
        $my_events = $this->getUser()->getEvents();

        return $this->render('AppBundle:Event:my_events.html.twig', ['my_events' => $my_events]);
    }
}
