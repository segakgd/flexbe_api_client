<?php

namespace Segakgd\FlexbeApiClient\Dto;

use ArrayIterator;
use Countable;
use IteratorAggregate;
use Traversable;

class Collections implements IteratorAggregate, Countable
{
    private array $items = [];

    public function add(Object $lead): void
    {
        $this->items[] = $lead;
    }

    public function get(int $index): ?Object
    {
        return $this->items[$index] ?? null;
    }

    public function list(): array
    {
        return $this->items;
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->items);
    }

    public function count(): int
    {
        return count($this->items);
    }
}
