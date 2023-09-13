<?php
declare(strict_types=1);
namespace Shared\Validator;

use Shared\TemplateVariables\TemplateVariables;

class ErrorResult implements Result
{
    public function __construct(private readonly TemplateVariables $templateVariables)
    {
    }

    public function getTemplateVariables(): TemplateVariables
    {
        return $this->templateVariables;
    }

    public function hasErrors(): bool
    {
        return true;
    }
}
