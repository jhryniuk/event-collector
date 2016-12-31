<?php

namespace App\Infrastructure\Application\Factory;

use App\Domain\Event;
use App\Domain\User;
use App\Domain\ValueObjects\DateTimeType;
use App\Domain\ValueObjects\IntNumber;
use App\Domain\ValueObjects\StringType;

class EventFactory implements \App\Application\Factory\EventFactory
{

    /**
     * @param IntNumber $id
     * @param User $user
     * @param StringType $title
     * @param StringType $description
     * @param DateTimeType $date_start
     * @param DateTimeType $date_end
     * @return Event
     */
    public function createEvent(
        IntNumber $id,
        User $user,
        StringType $title,
        StringType $description,
        DateTimeType $date_start,
        DateTimeType $date_end
    ) {
        $event = new Event($id, $user, $title, $description, $date_start, $date_end);

        return $event;
    }
}