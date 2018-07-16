<?php

namespace Enumerable;

use Enumerable\Iterator\Concat;
use Enumerable\Iterator\Filter;

class Enumerable implements \Iterator
{
    /** @var iterable */
    private $source;

    public function __construct(iterable $source)
    {
        if (is_array($source)) {
            $source = new \ArrayIterator($source);
        }

        $this->source = $source;
    }

    public function filter(callable $predicate): self
    {
        return (new Filter())($this->source, $predicate);
    }

    public function concat(array $sequence): self
    {
        return (new Concat())($this->source, $sequence);
    }

    public function current()
    {
        return $this->source->current();
    }

    public function next()
    {
        $this->source->next();
    }

    public function key(): int
    {
        return $this->source->key();
    }

    public function valid()
    {
        return $this->source->valid();
    }

    public function rewind()
    {
        $this->source->rewind();
    }
}
