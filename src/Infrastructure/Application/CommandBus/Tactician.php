<?php

namespace App\Application\CommandBus;

use App\Application\CommandBus as BaseCommandBus;
use League\Tactician\CommandBus;

class Tactician implements BaseCommandBus
{
    /** @var  CommandBus */
    private $commandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    /**
     * @param $command
     */
    public function handle($command)
    {
        $this->commandBus->handle($command);
    }
}
