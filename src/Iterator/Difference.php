<?php

declare(strict_types=1);

namespace Enumerable\Iterator;

use Enumerable\Enumerable;

final class Difference
{
    public function __invoke(iterable $flow, array $array)
    {
        return new Enumerable(
            (function () use ($flow, $array) {
                foreach ($flow as $item) {
                    if (!in_array($item, $array)) {
                        yield $item;
                    }
                }
            })()
        );
    }
}
