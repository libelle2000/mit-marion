<?php
declare(strict_types=1);

namespace Shared\ValueObject\Base;

abstract class BaseString
{
    public function __construct(private readonly string $value)
    {
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function isEqualToValue(string $other): bool
    {
        return $this->value === $other;
    }
}
