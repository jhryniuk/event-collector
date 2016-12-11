<?php

namespace spec\App\Domain\ValueObjects;

use App\Domain\ValueObjects\Id;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Ramsey\Uuid\Uuid;

class IdSpec extends ObjectBehavior
{
    private $id;

    public function it_is_initializable()
    {
        $this->shouldHaveType(Id::class);
    }

    public function let()
    {
        $this->id = Uuid::uuid4()->toString();
        $this->beConstructedWith($this->id);
    }

    public function it_should_not_be_empty()
    {
        $this->__toString()->shouldReturn($this->id);
    }

    public function it_should_has_equal()
    {
        $this->equal($this->id)->shouldReturn(true);
        $this->equal('wrongId')->shouldReturn(false);
    }
}
