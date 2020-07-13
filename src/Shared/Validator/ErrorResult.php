<?php
declare(strict_types=1);
namespace Shared\Validator;

use Shared\TemplateVariables\TemplateVariables;

class ErrorResult implements Result
{
    /**
     * @var TemplateVariables
     */
    private $templateVariables;

    public function __construct(TemplateVariables $templateVariables)
    {
        $this->templateVariables = $templateVariables;
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
