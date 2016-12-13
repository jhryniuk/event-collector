<?php

namespace spec\App\Domain\ValueObjects;

use App\Domain\ValueObjects\DateTimeType;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DateTimeTypeSpec extends ObjectBehavior
{
    private $date;
    public function it_is_initializable()
    {
        $this->shouldHaveType(DateTimeType::class);
    }

    public function let()
    {
        $this->date = new \DateTime();
        $this->beConstructedWith($this->date);
    }

    public function it_should_throw_exception_when_constructed_with_wrong_arguments()
    {
        $this->shouldThrow(\InvalidArgumentException::class)->during('__construct', ['12.12.2016']);
    }

    public function it_should_has_get_value()
    {
        $this->getValue()->shouldReturn($this->date);
    }

    public function it_should_has_equal()
    {
        $stringDate = $this->date->format('Y-m-d H:i:s');
        $this->equal($stringDate)->shouldReturn(true);
    }
}
