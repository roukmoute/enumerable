<?php

declare(strict_types=1);

namespace Enumerable;

/**
 * It is used to compare any element.
 */
final class Comparer
{
    private $slots;

    private $hashCode;

    public function __construct()
    {
        $this->slots = [];
    }

    /**
     * If value is not in set, add it and return true; otherwise return false
     */
    public function add($value): bool
    {
        if ($this->find($value)) {
            return false;
        }

        $this->slots[] = $this->hashCode;

        return true;
    }

    public function find($value): bool
    {
        $this->hashCode = $this->hashCode($value);

        return in_array($this->hashCode, $this->slots);
    }

    private function hashCode($value): string
    {
        if (is_object($value)) {
            return spl_object_hash((object) $value);
        }

        if (is_array($value)) {
            $value = serialize($value);
        }

        return md5((string) $value);
    }
}
