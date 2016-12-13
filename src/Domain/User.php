<?php

namespace App\Domain;

use App\Domain\ValueObjects\IntNumber;
use App\Domain\ValueObjects\StringType;

class User
{
    /** @var IntNumber */
    private $id;
    /** @var StringType */
    private $firstName;
    /** @var StringType */
    private $lastName;
    /** @var IntNumber */
    private $age;
    /** @var StringType */
    private $email;

    /**
     * User constructor.
     * @param IntNumber $id
     * @param StringType $firstName
     * @param StringType $lastName
     * @param IntNumber $age
     * @param StringType $email
     */
    public function __construct(
        IntNumber $id,
        StringType $firstName,
        StringType $lastName,
        IntNumber $age,
        StringType $email
    ) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->age = $age;
        $this->email = $email;
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
    public function getFirstName()
    {
        return $this->firstName->getValue();
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName->getValue();
    }

    /**
     * @return int
     */
    public function getAge()
    {
        return $this->age->getValue();
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email->getValue();
    }
}
