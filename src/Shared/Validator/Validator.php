<?php
declare(strict_types=1);

namespace Shared\Validator;

interface Validator
{
    public function validate(): Result;
}
