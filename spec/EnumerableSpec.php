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

    function it_concatenates_two_sequences()
    {
        $this->beConstructedWith([1]);

        $query = $this->getWrappedObject()->concat([2]);

        $expect = [1, 2];
        $key = 0;
        foreach ($query as $item) {
            expect($item)->toBe($expect[$key++]);
        }
    }

    function it_removes_the_contents_of_the_supplied_list_from_the_pipeline()
    {
        $this->beConstructedWith([1, 1, 2, 2, 3, 4]);

        $query = $this->getWrappedObject()->difference([1, 3]);

        $expect = [2, 2, 4];
        foreach ($query as $key => $item) {
            expect($item)->toBe($expect[$key]);
        }
    }

    function it_returns_distinct_elements_from_a_sequence()
    {
        $this->beConstructedWith([21, 46, 46, 55, 17, 21, 55, 55]);

        $query = $this->getWrappedObject()->distinct();

        $expect = [21, 46, 55, 17];
        foreach ($query as $key => $item) {
            expect($item)->toBe($expect[$key]);
        }
    }
}
