<?php

namespace spec\Enumerable;

use Enumerable\Enumerable;
use PhpSpec\ObjectBehavior;

class EnumerableSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith([]);
        $this->shouldHaveType(Enumerable::class);
    }

    function it_implements_Iterator()
    {
        $this->beConstructedWith([]);
        $this->shouldImplement(\Iterator::class);
    }

    function it_can_be_constructed_with_an_array()
    {
        $this->beConstructedWith([1, 2, 3]);

        $this->shouldNotThrow(\Exception::class)->duringInstantiation();
    }

    function it_can_be_constructed_with_a_Generator()
    {
        $this->beConstructedWith(
            (function () {
                yield 1;
            })()
        );

        $this->shouldNotThrow(\Exception::class)->duringInstantiation();
    }
}
