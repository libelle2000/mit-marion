<?php
declare(strict_types=1);
namespace Shared\Validator;

use Shared\TemplateVariables\TemplateVariables;

abstract class Result
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
        return false;
    }
}
