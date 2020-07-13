<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\Partial\ContactFormElement;

use Shared\TemplateVariables\Form\Element;

class EMail extends Element implements TemplateIdentifier
{
    protected function getTemplateIdentifier(): string
    {
        return self::TEMPLATE_IDENTIFIER_E_MAIL;
    }
}
