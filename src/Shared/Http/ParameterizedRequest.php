<?php

declare(strict_types=1);

namespace Shared\Http;

interface ParameterizedRequest
{
    public function hasParameterWithValue(string $key): bool;

    public function getParameter(string $key): string;
}
