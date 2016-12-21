<?php

namespace App\Application\UseCase\CreateEvent;

use App\Application\Command;

final class CreateEventCommand implements Command
{
    public $id;
    public $title;
    public $user;
    public $description;
    public $date_start;
    public $date_end;
}