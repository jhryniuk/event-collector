<?php

namespace spec\App\Domain\ValueObjects;

use App\Domain\ValueObjects\IntNumber;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class IntNumberSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(IntNumber::class);
    }

    public function let()
    {
        $this->beConstructedWith(1);
    }

    public function it_should_throw_exception_when_constructed_with_string()
    {
       $this->shouldThrow(\InvalidArgumentException::class)->during('__construct', ['test']);
    }

    public function it_should_not_be_empty()
    {
        $this->getValue()->shouldReturn(1);
    }

    public function it_should_has_equal()
    {
        $this->equal(1)->shouldReturn(true);
        $this->equal('1')->shouldReturn(true);
        $this->equal(2)->shouldReturn(false);
        $this->equal('2')->shouldReturn(false);
    }

    public function it_should_has_same()
    {
        $this->same(1)->shouldReturn(true);
        $this->same('1')->shouldReturn(false);
        $this->same(2)->shouldReturn(false);
        $this->same('2')->shouldReturn(false);
    }
}
