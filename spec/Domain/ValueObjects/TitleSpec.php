<?php

namespace spec\App\Domain\ValueObjects;

use App\Domain\ValueObjects\Title;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TitleSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Title::class);
    }

    public function let()
    {
        $this->beConstructedWith('Title');
    }

    public function it_should_not_be_empty()
    {
        $this->__toString()->shouldReturn('Title');
    }

    public function it_should_has_equal()
    {
        $this->equal('Title')->shouldReturn(true);
        $this->equal('Wrong Title')->shouldReturn(false);
    }
}
