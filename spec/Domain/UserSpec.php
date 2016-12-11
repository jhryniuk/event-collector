<?php

namespace spec\App\Domain;

use App\Domain\User;
use App\Domain\ValueObjects\IntNumber;
use App\Domain\ValueObjects\StringType;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(User::class);
    }

    public function let()
    {
        $id = new IntNumber(1);
        $firstName = new StringType('Robert');
        $lastName = new StringType('Martin');
        $age = new IntNumber(65);
        $email = new StringType('unclebob@gmail.com');

        $this->beConstructedWith($id, $firstName, $lastName, $age, $email);
    }

    public function it_should_has_getId()
    {
        $this->getId()->shouldReturn(1);
    }

    public function it_should_has_getFirstName()
    {
        $this->getFirstName()->shouldReturn('Robert');
    }

    public function it_should_has_getLastName()
    {
        $this->getLastName()->shouldReturn('Martin');
    }

    public function it_should_has_getAge()
    {
        $this->getAge()->shouldReturn(65);
    }

    public function it_should_has_getEmail()
    {
        $this->getEmail()->shouldReturn('unclebob@gmail.com');
    }
}
