<?php

declare(strict_types=1);

namespace Shared\Environment;

use RuntimeException;
use Shared\ValueObject\Base\Identifier;

class Environment
{
    public function __construct(
        /**
         * @var array<string, string>
         */
        private array $values
    )
    {
    }

    public static function fromGlobals(): Environment
    {
        return new self($_ENV);
    }

    public function hasValue(Identifier $key): bool
    {
        return isset($this->values[$key->getValue()]);
    }

    public function getValue(Identifier $key): EnvironmentValue
    {
        if ($this->hasValue($key)) {
            return new EnvironmentValue($this->values[$key->getValue()]);
        }
        throw new RuntimeException(
            sprintf('value not found [%s]', $key->getValue())
        );
    }
}
