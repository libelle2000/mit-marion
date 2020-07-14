<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\Partial;

use MitMarion\TemplateVariables\Partial\ContactFormElement\CustomerMessageWithCustomerDataAndErrors;
use MitMarion\TemplateVariables\Partial\ContactFormElement\DataPrivacyWithCustomerDataAndErrors;
use MitMarion\TemplateVariables\Partial\ContactFormElement\EMailWithCustomerDataAndErrors;
use MitMarion\TemplateVariables\Partial\ContactFormElement\PreNameWithCustomerDataAndErrors;
use MitMarion\TemplateVariables\Partial\ContactFormElement\SurNameWithCustomerDataAndErrors;

class ContactFormElementsWithCustomerDataAndErrorsTemplateVariables extends ContactFormElementsTemplateVariables
{
    public function __construct(
        PreNameWithCustomerDataAndErrors $preName,
        SurNameWithCustomerDataAndErrors $surName,
        EMailWithCustomerDataAndErrors $eMail,
        CustomerMessageWithCustomerDataAndErrors $message,
        DataPrivacyWithCustomerDataAndErrors $dataPrivacy
    ) {
        parent::__construct($preName, $surName, $eMail, $message, $dataPrivacy);
    }

    protected function hasErrors(): bool
    {
        return true;
    }
}
