<?php

namespace App\Application\UseCase\CreateEvent;

use App\Application\Command;
use App\Domain\ValueObjects\DateTimeType;
use App\Domain\ValueObjects\IntNumber;
use App\Domain\ValueObjects\StringType;

final class CreateEventCommand implements Command
{
    public $id;
    public $title;
    public $userId;
    public $description;
    public $date_start;
    public $date_end;

    public function __construct(
        IntNumber $id,
        StringType $title,
        IntNumber $userId,
        StringType $description,
        DateTimeType $date_start,
        DateTimeType $date_end
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->userId = $userId;
        $this->description = $description;
        $this->date_start = $date_start;
        $this->date_end = $date_end;
    }
}
