<?php

namespace App\Infrastructure\Domain;

use App\Domain\User;
use App\Domain\ValueObjects\IntNumber;
use App\Domain\ValueObjects\StringType;

class UserRegistry implements \App\Domain\UserRegistry
{
    private $registry = [];
    /**
     * @param User $user
     * @return void
     */
    public function register(User $user)
    {
        $this->registry[$user->getId()] = $user;
    }

    /**
     * @param User $user
     * @return void
     */
    public function remove(User $user)
    {
        unset($this->registry[$user->getId()]);
    }

    /**
     * @param StringType $email
     * @return User|null
     */
    public function findByEmail(StringType $email)
    {
        $target = null;
        foreach ($this->registry as $item) {
            if ($email->equal($item->getEmail())) {
                $target = $item;
            }
        }

        return $target;
    }

    /**
     * @param IntNumber $id
     * @return null|User
     */
    public function findById(IntNumber $id)
    {
        $target = null;
        foreach ($this->registry as $item) {
            if ($id->equal($item->getId())) {
                $target = $item;
            }
        }

        return $target;
    }

    public function getContent()
    {
        return $this->registry;
    }
}
