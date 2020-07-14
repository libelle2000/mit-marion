<?php

declare(strict_types=1);

namespace MitMarion\TemplateVariables\Partial;

interface ErrorFlag
{
    public function hasErrors(): bool;
}
