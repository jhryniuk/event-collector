<?php

namespace App\Domain;

use App\Domain\Exception\LogicException;
use App\Domain\ValueObjects\IntNumber;
use App\Domain\ValueObjects\StringType;

class User
{
    /** @var IntNumber */
    private $id;
    /** @var StringType */
    private $firstName;
    /** @var StringType */
    private $lastName;
    /** @var IntNumber */
    private $age;
    /** @var StringType */
    private $email;
    /** @var  Event[] */
    protected $events;

    /**
     * User constructor.
     * @param IntNumber $id
     * @param StringType $firstName
     * @param StringType $lastName
     * @param IntNumber $age
     * @param StringType $email
     */
    public function __construct(
        IntNumber $id,
        StringType $firstName,
        StringType $lastName,
        IntNumber $age,
        StringType $email
    ) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->age = $age;
        $this->email = $email;
        $this->events = [];
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id->getValue();
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName->getValue();
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName->getValue();
    }

    /**
     * @return int
     */
    public function getAge()
    {
        return $this->age->getValue();
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email->getValue();
    }

    /**
     * @param Event $event
     * @throws LogicException
     */
    public function addEvent(Event $event)
    {
        if ($this->eventTitleExists($event->getTitle())) {
            throw new LogicException("Event title {$event->getTitle()} already exist.");
        }

        $this->events[$event->getId()] = $event;
    }

    /**
     * @return Event[]|array
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * @param Event $event
     */
    public function removeEvent(Event $event)
    {
        unset($this->events[$event->getId()]);
    }

    /**
     * @param IntNumber $eventId
     * @return Event|mixed
     * @throws LogicException
     */
    public function getEventById(IntNumber $eventId)
    {
        if (isset($this->events[$eventId->getValue()])) {
            return $this->events[$eventId->getValue()];
        }

        throw new LogicException("Event doesn't exist.");
    }

    /**
     * @param StringType $eventTitle
     * @return array
     */
    private function eventTitleExists(StringType $eventTitle)
    {
        $found = [];

        foreach ($this->events as $event) {
            if ($event->getTitle() === $eventTitle) {
                $found[] = $event;
            }
        }

        return $found;
    }
}
