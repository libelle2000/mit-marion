<?php
declare(strict_types=1);

namespace Shared\Validator;

class SuccessResult implements Result
{
    public function hasErrors(): bool
    {
        return false;
    }
}
