<?php

namespace App\Application\UseCase;

interface ResponderAware
{
    /**
     * @param Responder $responder
     * @return void
     */
    public function addResponder(Responder $responder);
}