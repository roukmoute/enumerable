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

    function it_filters_a_sequence_of_values_based_on_a_predicate()
    {
        $numbers = [0, 30, 20, 15, 90, 85, 40, 75];

        $this->beConstructedWith($numbers);

        $query = $this->getWrappedObject()->filter(
            function (int $number, int $index) {
                return $number <= $index * 10;
            }
        )
        ;

        $expect = [0, 20, 15, 40];
        foreach ($query as $key => $item) {
            expect($item)->toBe($expect[$key]);
        }
    }
}
