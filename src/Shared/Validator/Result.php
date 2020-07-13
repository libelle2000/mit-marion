<?php
declare(strict_types=1);
namespace Shared\Validator;

interface Result
{
    public function hasErrors(): bool;
}
