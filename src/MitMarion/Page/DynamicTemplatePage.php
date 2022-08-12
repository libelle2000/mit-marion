<?php
declare(strict_types=1);

namespace MitMarion\Page;

use Shared\Page\Page;
use Shared\Renderer\Renderer;
use Shared\TemplateVariables\TemplateVariables;

abstract class DynamicTemplatePage implements Page
{
    private Renderer $renderer;

    private TemplateVariables $templateVariables;

    public function __construct(Renderer $renderer, TemplateVariables $templateVariables)
    {
        $this->renderer = $renderer;
        $this->templateVariables = $templateVariables;
    }

    public function asString(): string
    {
        return $this->renderer->renderWithTemplateVariables($this->templateVariables);
    }
}
