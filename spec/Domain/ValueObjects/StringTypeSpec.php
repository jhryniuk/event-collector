<?php

namespace spec\App\Domain\ValueObjects;

use App\Domain\ValueObjects\StringType;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StringTypeSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(StringType::class);
    }

    public function let()
    {
        $this->beConstructedWith('TEST');
    }

    public function it_should_throw_exception_when_constructed_with_no_string()
    {
        $this->shouldThrow(\InvalidArgumentException::class)->during('__construct', [1]);
    }

    public function it_should_has_getValue()
    {
        $this->getValue()->shouldReturn('TEST');
    }

    public function it_should_has_equal()
    {
        $this->equal('TEST')->shouldReturn(true);
        $this->equal('Test')->shouldReturn(false);
    }
}
