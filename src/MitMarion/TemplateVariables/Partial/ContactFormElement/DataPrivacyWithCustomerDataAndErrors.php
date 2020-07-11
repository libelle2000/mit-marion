<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\Partial\ContactFormElement;

use Shared\TemplateVariables\Form\ElementWithCustomerDataAndErrors;

class DataPrivacyWithCustomerDataAndErrors extends ElementWithCustomerDataAndErrors
{
    protected function getTemplateIdentifier(): string
    {
        return 'dataPrivacy';
    }
}
