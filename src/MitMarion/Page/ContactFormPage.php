<?php
declare(strict_types=1);
namespace MitMarion\Page;

use MitMarion\TemplateVariables\ContactFormTemplateVariables;
use Shared\Renderer\Renderer;

class ContactFormPage extends DynamicTemplatePage
{
    public function __construct(Renderer $renderer, ContactFormTemplateVariables $templateVariables)
    {
        parent::__construct($renderer, $templateVariables);
    }
}
