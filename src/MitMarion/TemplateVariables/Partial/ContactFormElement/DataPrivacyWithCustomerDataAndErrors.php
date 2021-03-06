<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\Partial\ContactFormElement;

use Shared\TemplateVariables\Form\ElementWithCustomerDataAndErrors;

class DataPrivacyWithCustomerDataAndErrors  extends ElementWithCustomerDataAndErrors implements TemplateIdentifier
{
    protected function getTemplateIdentifier(): string
    {
        return self::TEMPLATE_IDENTIFIER_DATA_PRIVACY;
    }
}
