<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\Partial;

use Shared\TemplateVariables\Form\ElementWithCustomerData;

class ContactFormElementsWithCustomerDataAndErrorsTemplateVariables extends ContactFormElementsTemplateVariables
{
    public function __construct(
        ElementWithCustomerData $reCaptcha,
        ElementWithCustomerData $preName,
        ElementWithCustomerData $surName,
        ElementWithCustomerData $eMail,
        ElementWithCustomerData $message,
        ElementWithCustomerData $dataPrivacy
    ) {
        parent::__construct($reCaptcha, $preName, $surName, $eMail, $message, $dataPrivacy);
    }

    protected function hasErrors(): bool
    {
        return true;
    }
}
