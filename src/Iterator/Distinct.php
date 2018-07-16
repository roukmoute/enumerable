<?php

declare(strict_types=1);

namespace Enumerable\Iterator;

use Enumerable\Comparer;
use Enumerable\Enumerable;

final class Distinct
{
    public function __invoke($source): Enumerable
    {
        return new Enumerable(
            (function () use ($source) {
                $set = new Comparer();

                foreach ($source as $key => $item) {
                    if ($set->add($item)) {
                        yield $item;
                    }
                }
            })()
        );
    }
}
