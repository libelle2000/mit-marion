<?php

declare(strict_types=1);

namespace Shared\BaseValueObject;

use ArrayIterator;
use IteratorAggregate;
use RuntimeException;

abstract class BaseUniqueCollection implements IteratorAggregate
{
    /**
     * @var array
     */
    protected $elements = [];

    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->elements);
    }

    protected function addUniqueElement($element, Identifier $key): void
    {
        if ($this->hasElementWithInternalKey($key)) {
            $message = sprintf('Collection already has entry with key "%s"', $key);

            throw new RuntimeException($message);
        }
        $this->elements[$key->getValue()] = $element;
    }

    protected function hasElement(Identifier $key): bool
    {
        return $this->hasElementWithInternalKey($key);
    }

    protected function getElement(Identifier $key)
    {
        if (!$this->hasElementWithInternalKey($key)) {
            $message = sprintf('Key "%s" does not exist in collection', $key);
            throw new RuntimeException($message);
        }

        return $this->elements[$key->getValue()];
    }

    private function hasElementWithInternalKey(Identifier $key): bool
    {
        return array_key_exists($key->getValue(), $this->elements);
    }
}
