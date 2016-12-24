<?php

namespace spec\App\Application\UseCase\CreateUser;

use App\Application\Factory\UserFactory;
use App\Application\UseCase\CreateUser\CreateUserCommand;
use App\Application\UseCase\CreateUser\CreateUserHandler;
use App\Application\UseCase\CreateUser\CreateUserResponder;
use App\Domain\User;
use App\Domain\UserRegistry;
use App\Domain\ValueObjects\IntNumber;
use App\Domain\ValueObjects\StringType;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CreateUserHandlerSpec extends ObjectBehavior
{
    private $userFactory;
    private $userRegistry;

    function it_is_initializable()
    {
        $this->shouldHaveType(CreateUserHandler::class);
    }

    public function let(UserFactory $userFactory, UserRegistry $userRegistry)
    {
        $this->userFactory = $userFactory;
        $this->userRegistry = $userRegistry;
        $this->beConstructedWith($userFactory, $userRegistry);
    }

    public function it_notify_when_user_is_created(
        CreateUserResponder $responder,
        UserRegistry $registry,
        User $user,
        UserFactory $userFactory
    ) {
        $this->addResponder($responder);
        $userId = new IntNumber(1);
        $userFirstName = new StringType('Fname');
        $userLastName = new StringType('Lname');
        $userAge = new IntNumber(32);
        $userEmail = new StringType('test@gmail.com');

        $email = 'test@gmail.com';

        $userFactory->createUser($userId, $userFirstName, $userLastName, $userAge, $userEmail)->willReturn($user);
        $registry->findByEmail($email)->willReturn(null);

        $responder->userCreated($user)->shouldBeCalled();
        $responder->userNotCreated($user)->shouldNotBeCalled();

        $this->handle(new CreateUserCommand($userId, $userFirstName, $userLastName, $userAge, $userEmail));
    }

    public function it_notify_when_user_is_not_created(
        CreateUserResponder $responder,
        UserRegistry $registry,
        User $user,
        UserFactory $userFactory
    ) {
        $this->addResponder($responder);
        $userId = new IntNumber(1);
        $userFirstName = new StringType('Fname');
        $userLastName = new StringType('Lname');
        $userAge = new IntNumber(32);
        $userEmail = new StringType('test@gmail.com');

        $userFactory->createUser($userId, $userFirstName, $userLastName, $userAge, $userEmail)->willReturn($user);
        $registry->findByEmail('test@gmail.com')->willReturn($user);

        $responder->userCreated($user)->shouldBeCalled();
        $responder->userNotCreated($user)->shouldNotBeCalled();

        $this->handle(new CreateUserCommand($userId, $userFirstName, $userLastName, $userAge, $userEmail));
    }
}
