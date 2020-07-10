<?php
declare(strict_types=1);

namespace Shared\BaseValueObject;

abstract class BaseString
{
    /**
     * @var string
     */
    private $value;

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
