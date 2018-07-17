<?php

declare(strict_types=1);

namespace Enumerable\Iterator;

use Enumerable\Enumerable;

final class Slice
{
    public function __invoke($source, int $from, int $to): Enumerable
    {
        return new Enumerable(
            (function () use ($source, $from, $to) {
                foreach ($source as $key => $item) {
                    if ($to >= 0 && $key > $to) {
                        break;
                    }

                    if ($key >= $from) {
                        yield $item;
                    }
                }
            })()
        );
    }
}
