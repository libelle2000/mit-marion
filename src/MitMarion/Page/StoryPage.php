<?php
declare(strict_types=1);

namespace MitMarion\Page;

use MitMarion\TemplateVariables\StoryPageTemplateVariables;
use Shared\Renderer\Renderer;

class StoryPage extends DynamicTemplatePage
{
    public function __construct(Renderer $renderer, StoryPageTemplateVariables $templateVariables)
    {
        parent::__construct($renderer, $templateVariables);
    }
}
