<?php
declare(strict_types=1);

namespace MitMarion\Page;

use Shared\Page\Page;
use Shared\Renderer\Renderer;
use Shared\TemplateVariables\TemplateVariables;

abstract class DynamicTemplatePage implements Page
{
    public function __construct(private readonly Renderer $renderer, private readonly TemplateVariables $templateVariables)
    {
    }

    public function asString(): string
    {
        return $this->renderer->renderWithTemplateVariables($this->templateVariables);
    }
}
