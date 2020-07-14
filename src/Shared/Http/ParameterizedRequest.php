<?php

declare(strict_types=1);

namespace Shared\Http;

use Shared\BaseValueObject\Identifier;

interface ParameterizedRequest
{
    public function hasParameterWithValue(Identifier $key): bool;

    public function getParameter(Identifier $key): string;
}
