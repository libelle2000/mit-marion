<?php
declare(strict_types=1);

namespace MitMarion\Http;

use RuntimeException;
use Shared\BaseValueObject\Identifier;
use Shared\Http\ParameterizedRequest;

class Request implements ParameterizedRequest
{
    private const REQUEST_METHOD_POST = 'POST';

    /**
     * @var string
     */
    private $requestMethod;
    /**
     * @var array
     */
    private $parameter;

    public function __construct(string $requestMethod, array $post)
    {
        $this->requestMethod = $requestMethod;
        $this->parameter = $post;
    }

    public static function fromGlobals(): self
    {
        return new static(strtoupper($_SERVER['REQUEST_METHOD']), $_POST);
    }

    public function getParameter(Identifier $key): string
    {
        if ($this->hasParameter($key)) {
            return trim($this->parameter[$key->getValue()]);
        }

        throw new RuntimeException(
            sprintf('parameter not found [%s]', $key)
        );
    }

    public function isEmptyParameter(Identifier $key): bool
    {
        if (!$this->hasParameter($key)) {
            throw new RuntimeException(
                sprintf('parameter not found [%s]', $key)
            );
        }
        return trim($this->parameter[$key->getValue()]) === '';
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
