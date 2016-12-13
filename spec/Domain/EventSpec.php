<?php

namespace spec\App\Domain;

use App\Domain\Event;
use App\Domain\ValueObjects\DateTimeType;
use App\Domain\ValueObjects\IntNumber;
use App\Domain\ValueObjects\StringType;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class EventSpec extends ObjectBehavior
{
    private $id;
    private $title;
    private $description;
    private $date_start;
    private $date_end;

    function it_is_initializable()
    {
        $this->shouldHaveType(Event::class);
    }

    public function let()
    {
        $this->id = new IntNumber(1);
        $this->title = new StringType('Title');
        $this->description = new StringType('Description of Event');
        $this->date_start = new DateTimeType(new \DateTime('+1 day'));
        $this->date_end = new DateTimeType(new \DateTime('+7 day'));
        $this->beConstructedWith(
            $this->id,
            $this->title,
            $this->description,
            $this->date_start,
            $this->date_end
        );
    }

    public function it_should_has_getId()
    {
        $this->getId()->shouldReturn(1);
    }

    public function it_should_has_getTitle()
    {
        $this->getTitle()->shouldReturn('Title');
    }

    public function it_should_has_getDescription()
    {
        $this->getDescription()->shouldReturn('Description of Event');
    }

    public function it_should_has_getDateStart()
    {
        $this->getDateStart()->shouldReturn($this->date_start->getValue());
    }

    public function it_should_has_getDateEnd()
    {
        $this->getDateEnd()->shouldReturn($this->date_end->getValue());
    }
}
