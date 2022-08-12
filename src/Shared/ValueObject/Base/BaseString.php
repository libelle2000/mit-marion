<?php
declare(strict_types=1);

namespace Shared\ValueObject\Base;

abstract class BaseString
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
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
