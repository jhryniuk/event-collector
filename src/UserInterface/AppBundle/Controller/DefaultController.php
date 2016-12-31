<?php

namespace App\UserInterface\AppBundle\Controller;

use App\Application\UseCase\CreateEvent\CreateEventCommand;
use App\Application\UseCase\CreateEvent\CreateEventHandler;
use App\Application\UseCase\CreateUser\CreateUserCommand;
use App\Application\UseCase\CreateUser\CreateUserHandler;
use App\Domain\ValueObjects\DateTimeType;
use App\Domain\ValueObjects\IntNumber;
use App\Domain\ValueObjects\StringType;
use App\Infrastructure\Application\Factory\EventFactory;
use App\Infrastructure\Application\Factory\UserFactory;
use App\Infrastructure\Domain\UserRegistry;
use App\UserInterface\AppBundle\Formatters\EventFormatters\EventLightFromatter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $userRegistry = new UserRegistry();
        $userFactory = new UserFactory();
        $eventFactory = new EventFactory();

        $user = new CreateUserCommand(new IntNumber(1), new StringType('Jan'), new StringType('Hryniuk'),
            new IntNumber(32),
            new StringType('jasiekhryniuk@gmail.com'));


        $handledUser = new CreateUserHandler($userFactory, $userRegistry);
        $handledUser->handle($user);

        $event = new CreateEventCommand(new IntNumber(1), new StringType('Event title'), new IntNumber(1),
            new StringType('Event description'), new DateTimeType(new \DateTime('-1 day')),
            new DateTimeType(new \DateTime('+7 day')));

        $handledEvent = new CreateEventHandler($userRegistry, $eventFactory);
        $handledEvent->handle($event);

        $user = $userRegistry->findByEmail(new StringType('jasiekhryniuk@gmail.com'));
        $events = $user->getEvents();
        $test = 'test value';

        return $this->render('default/index.html.twig', ['users' => $userRegistry, 'data' => $events, 'test' => $test]);
    }
}