<?php

namespace App\UserInterface\AppBundle\Formatters\EventFormatters;

class EventCollectionFormatter
{
    private $result = [];
    const LIGHT = 1;
    const DETAIL = 2;
    public function __construct(array $events, $type)
    {
        if ($type == self::LIGHT) {
            foreach ($events as $event) {
                $formatter = new EventLightFromatter($event);
                $this->result[] = $formatter->jsonSerialize();
            }
        }

        if ($type == self::DETAIL) {
            foreach ($events as $event) {
                $formatter = new EventDetailFromatter($event);
                $this->result[] = $formatter->jsonSerialize();
            }
        }
    }

    public function getResult()
    {
        return $this->result;
    }
}