<?php

namespace App\Domain;

use App\Domain\ValueObjects\IntNumber;

/**
 * Interface UserRegistry
 * @package App\Domain
 */
interface UserRegistry
{
    /**
     * @param User $user
     * @return void
     */
    public function register(User $user);

    /**
     * @param User $user
     * @return void
     */
    public function remove(User $user);

    /**
     * @param IntNumber $user
     * @return null|User[]
     */
    public function find(IntNumber $user);
}