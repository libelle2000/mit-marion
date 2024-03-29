<?php
declare(strict_types=1);

namespace MitMarion\Http;

use RuntimeException;
use Shared\ValueObject\Base\Identifier;
use Shared\Http\ParameterizedRequest;
use Shared\Http\ParameterValue;

class Request implements ParameterizedRequest
{
    private const REQUEST_METHOD_POST = 'POST';

    public function __construct(private readonly string $requestMethod, private array $parameter)
    {
    }

    public static function fromGlobals(): self
    {
        return new static(strtoupper((string) $_SERVER['REQUEST_METHOD']), $_POST);
    }

    public function getParameter(Identifier $key): ParameterValue
    {
        if ($this->hasParameter($key)) {
            return new ParameterValue(trim((string) $this->parameter[$key->getValue()]));
        }

        throw new RuntimeException(
            sprintf('parameter not found [%s]', $key->getValue())
        );
    }

    public function isEmptyParameter(Identifier $key): bool
    {
        if (!$this->hasParameter($key)) {
            throw new RuntimeException(
                sprintf('parameter not found [%s]', $key->getValue())
            );
        }
        return trim((string) $this->parameter[$key->getValue()]) === '';
    }

    public function hasParameter(Identifier $key): bool
    {
        return isset($this->parameter[$key->getValue()]);
    }

    public function hasParameterWithValue(Identifier $key): bool
    {
        return $this->hasParameter($key) && !$this->isEmptyParameter($key);
    }

    public function isPost(): bool
    {
        return $this->requestMethod === self::REQUEST_METHOD_POST;
    }
}
