<?php
declare(strict_types=1);

namespace MitMarion\Page\Story;

use Shared\Page\Page;
use Shared\Renderer\Renderer;
use Shared\TemplateVariables\TemplateVariables;

class StoryPage implements Page
{
    /**
     * @var Renderer
     */
    private $renderer;

    /**
     * @var TemplateVariables
     */
    private $templateVariables;

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
