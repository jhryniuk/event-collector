<?php

namespace App\Application\UseCase;

trait ResponderAwareBehavior
{
    /** @var Responder[]  */
    protected $responders = [];

    /**
     * @inheritdoc
     */
    public function addResponder(Responder $responder)
    {
        $this->responders[] = $responder;
    }
}