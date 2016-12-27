<?php

namespace App\Application;

interface CommandBus
{
    /**
     * @param $command
     */
    public function handle($command);
}
