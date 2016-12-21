<?php

namespace App\Application\Factory;

use App\Domain\Event;
use App\Domain\ValueObjects\DateTimeType;
use App\Domain\ValueObjects\IntNumber;
use App\Domain\ValueObjects\StringType;

interface EventFactory
{
    /**
     * @param IntNumber $id
     * @param IntNumber $userId
     * @param StringType $title
     * @param StringType $description
     * @param DateTimeType $date_start
     * @param DateTimeType $date_end
     * @return Event
     */
    public function createEvent(
        IntNumber $id,
        IntNumber $userId,
        StringType $title,
        StringType $description,
        DateTimeType $date_start,
        DateTimeType $date_end
    );
}