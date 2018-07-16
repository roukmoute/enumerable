<?php

declare(strict_types=1);

namespace Enumerable\Iterator;

use Enumerable\Enumerable;

final class Concat
{
    public function __invoke(iterable $flow, array $array)
    {
        return new Enumerable(
            (function () use ($flow, $array) {
                foreach ($flow as $key => $item) {
                    yield $key => $item;
                }
                foreach ($array as $key => $value) {
                    yield $key => $value;
                }
            })()
        );
    }
}
