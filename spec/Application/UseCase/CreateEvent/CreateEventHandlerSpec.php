<?php

namespace spec\App\Application\UseCase\CreateEvent;

use App\Application\Factory\EventFactory;
use App\Application\UseCase\CreateEvent\CreateEventCommand;
use App\Application\UseCase\CreateEvent\CreateEventHandler;
use App\Application\UseCase\CreateEvent\CreateEventResponder;
use App\Application\UseCase\Responder;
use App\Domain\Event;
use App\Domain\Exception\LogicException;
use App\Domain\User;
use App\Domain\UserRegistry;
use App\Domain\ValueObjects\DateTimeType;
use App\Domain\ValueObjects\IntNumber;
use App\Domain\ValueObjects\StringType;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CreateEventHandlerSpec extends ObjectBehavior
{
    private $userRegistry;
    private $eventFactory;

    function it_is_initializable()
    {
        $this->shouldHaveType(CreateEventHandler::class);
    }

    public function let(UserRegistry $userRegistry, EventFactory $eventFactory)
    {
        $this->userRegistry = $userRegistry;
        $this->eventFactory = $eventFactory;
        $this->beConstructedWith($this->userRegistry, $this->eventFactory);
    }

    public function it_should_has_addResponder_method(Responder $responder)
    {
        $this->addResponder($responder);
    }

    public function it_notify_responders_when_event_is_created(
        CreateEventResponder $responder,
        UserRegistry $userRegistry,
        User $user,
        EventFactory $eventFactory,
        Event $event
    ) {
        $this->addResponder($responder);
        $userId = new IntNumber(1);
        $eventId = new IntNumber(1);
        $title = new StringType('Event Title');
        $description = new StringType('Event Description');
        $date_start = new DateTimeType(new \DateTime());
        $date_end = new DateTimeType(new \DateTime('+7 day'));

        $userRegistry->findById($userId)->willReturn($user);
        $user->addEvent(Argument::type(Event::class))->shouldBeCalled();
        $eventFactory->createEvent(
            $eventId,
            $userId,
            $title,
            $description,
            $date_start,
            $date_end
        )->willReturn($event);

        $user->addEvent($event)->shouldBeCalled();

        $responder->eventCreated(Argument::type(Event::class))->shouldBeCalled();
        $responder->eventAlreadyExist(Argument::type(Event::class))->shouldNotBeCalled();

        $this->handle(new CreateEventCommand($eventId, $title, $userId, $description, $date_start, $date_end));
    }

    public function it_notify_responders_when_event_is_alreadyExists(
        CreateEventResponder $responder,
        UserRegistry $userRegistry,
        User $user,
        EventFactory $eventFactory,
        Event $event
    ) {
        $this->addResponder($responder);
        $userId = new IntNumber(1);
        $eventId = new IntNumber(1);
        $title = new StringType('Event Title');
        $description = new StringType('Event Description');
        $date_start = new DateTimeType(new \DateTime());
        $date_end = new DateTimeType(new \DateTime('+7 day'));

        $userRegistry->findById($userId)->willReturn($user);
        $user->addEvent(Argument::type(Event::class))->shouldBeCalled();
        $eventFactory->createEvent(
            $eventId,
            $userId,
            $title,
            $description,
            $date_start,
            $date_end
        )->willReturn($event);

        $user->addEvent($event)->shouldBeCalled()->willThrow(LogicException::class);

        $responder->eventCreated(Argument::type(Event::class))->shouldNotBeCalled();
        $responder->eventAlreadyExist(Argument::type(Event::class))->shouldBeCalled();

        $this->handle(new CreateEventCommand($eventId, $title, $userId, $description, $date_start, $date_end));
    }
}
