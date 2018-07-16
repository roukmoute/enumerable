<?php

declare(strict_types=1);

namespace Enumerable\Iterator;

use Enumerable\Enumerable;

final class Filter
{
    public function __invoke($source, callable $predicate): Enumerable
    {
        return new Enumerable(
            (function () use ($source, $predicate) {
                foreach ($source as $key => $item) {
                    if ($predicate($item, $key)) {
                        yield $item;
                    }
                }
            })()
        );
    }
}
