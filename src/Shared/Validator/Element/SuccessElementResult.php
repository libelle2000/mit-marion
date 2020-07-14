<?php
declare(strict_types=1);

namespace Shared\Validator\Element;

class SuccessElementResult extends ElementResult
{
    public function hasErrors(): bool
    {
        return false;
    }
}
