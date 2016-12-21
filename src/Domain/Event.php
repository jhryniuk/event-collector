<?php

namespace App\Domain;

use App\Domain\ValueObjects\DateTimeType;
use App\Domain\ValueObjects\IntNumber;
use App\Domain\ValueObjects\StringType;

class Event
{

    private $id;
    private $title;
    private $user;
    private $description;
    private $date_start;
    private $date_end;

    /**
     * Event constructor.
     * @param IntNumber $id
     * @param User $user
     * @param StringType $title
     * @param StringType $description
     * @param DateTimeType $date_start
     * @param DateTimeType $date_end
     */
    public function __construct(
        IntNumber $id,
        User $user,
        StringType $title,
        StringType $description,
        DateTimeType $date_start,
        DateTimeType $date_end
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->user = $user;
        $this->description = $description;
        $this->date_start = $date_start;
        $this->date_end = $date_end;
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
    public function getTitle()
    {
        return $this->title->getValue();
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description->getValue();
    }

    /**
     * @return \DateTime
     */
    public function getDateStart()
    {
        return $this->date_start->getValue();
    }

    /**
     * @return \DateTime
     */
    public function getDateEnd()
    {
        return $this->date_end->getValue();
    }

    public function getUser()
    {
        return $this->user;
    }
}
