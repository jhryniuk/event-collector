<?php

namespace App\Domain;

use App\Domain\ValueObjects\IntNumber;
use App\Domain\ValueObjects\StringType;

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
     * @param StringType $email
     * @return null|User
     */
    public function findByEmail(StringType $email);

    /**
     * @param IntNumber $id
     * @return null|User
     */
    public function findById(IntNumber $id);
}