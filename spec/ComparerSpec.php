<?php

namespace spec\Enumerable;

use Enumerable\Comparer;
use PhpSpec\ObjectBehavior;

class ComparerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Comparer::class);
    }

    function it_adds_a_string()
    {
        $value = 'string';

        $this->add($value)->shouldReturn(true);
        $this->add($value)->shouldReturn(false);
    }

    function it_adds_an_integer()
    {
        $value = 42;

        $this->add($value)->shouldReturn(true);
        $this->add($value)->shouldReturn(false);
    }

    function it_adds_an_object()
    {
        $value = new \stdClass();

        $this->add($value)->shouldReturn(true);
        $this->add($value)->shouldReturn(false);
    }

    function it_adds_a_float()
    {
        $value = 4.2;

        $this->add($value)->shouldReturn(true);
        $this->add($value)->shouldReturn(false);
    }

    function it_adds_a_bool()
    {
        $value = false;

        $this->add($value)->shouldReturn(true);
        $this->add($value)->shouldReturn(false);
    }

    function it_adds_null()
    {
        $value = null;

        $this->add($value)->shouldReturn(true);
        $this->add($value)->shouldReturn(false);
    }

    function it_finds_an_elements()
    {
        $value = 'string';

        $this->add($value)->shouldReturn(true);
        $this->find($value)->shouldReturn(true);
    }
}
