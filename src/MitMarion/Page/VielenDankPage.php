<?php
declare(strict_types=1);
namespace MitMarion\Page;

use MitMarion\TemplateVariables\PageTemplateVariables;
use Shared\Renderer\Renderer;

class VielenDankPage extends DynamicTemplatePage
{
    public function __construct(Renderer $renderer, PageTemplateVariables $templateVariables)
    {
        parent::__construct($renderer, $templateVariables);
    }
}
