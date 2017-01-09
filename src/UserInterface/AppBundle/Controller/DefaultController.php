<?php

namespace App\UserInterface\AppBundle\Controller;

use App\Application\UseCase\CreateEvent\CreateEventCommand;
use App\Application\UseCase\CreateEvent\CreateEventHandler;
use App\Application\UseCase\CreateUser\CreateUserCommand;
use App\Application\UseCase\CreateUser\CreateUserHandler;
use App\Domain\ValueObjects\DateTimeType;
use App\Domain\ValueObjects\IntNumber;
use App\Domain\ValueObjects\StringType;
use App\UserInterface\AppBundle\Form\UserRegisterType;
use App\UserInterface\AppBundle\Formatters\EventFormatters\EventCollectionFormatter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $userRegistry = $this->get('userRegistry');
        $userFactory = $this->get('userFactory');
        $eventFactory = $this->get('eventFactory');

        $user = new CreateUserCommand(
            new IntNumber(1),
            new StringType('Jan'),
            new StringType('Hryniuk'),
            new IntNumber(33),
            new StringType('jasiekhryniuk@gmail.com')
        );


        $handledUser = new CreateUserHandler($userFactory, $userRegistry);
        $handledUser->handle($user);

        $user = $userRegistry->findByEmail(new StringType('jasiekhryniuk@gmail.com'));
        $event = new CreateEventCommand(
            new IntNumber(1),
            new StringType('Event title'),
            new IntNumber($user->getId()),
            new StringType('Event description'),
            new DateTimeType(new \DateTime('-1 day')),
            new DateTimeType(new \DateTime('+7 day'))
        );

        $handledEvent = new CreateEventHandler($userRegistry, $eventFactory);
        $handledEvent->handle($event);

        $events = $user->getEvents();
        $formattedEvents = new EventCollectionFormatter($events, EventCollectionFormatter::LIGHT);

        $form = $this->createForm(UserRegisterType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            var_dump($form->getData());
        }

        return $this->render('default/index.html.twig', [
            'users' => $userRegistry,
            'data' => $formattedEvents->getResult(),
            'form' => $form->createView()
        ]);
    }
}
