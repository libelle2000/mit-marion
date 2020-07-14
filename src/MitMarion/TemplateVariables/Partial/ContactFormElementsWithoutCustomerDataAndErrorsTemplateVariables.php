<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\Partial;

use MitMarion\TemplateVariables\Partial\ContactFormElement\CustomerMessage;
use MitMarion\TemplateVariables\Partial\ContactFormElement\DataPrivacy;
use MitMarion\TemplateVariables\Partial\ContactFormElement\EMail;
use MitMarion\TemplateVariables\Partial\ContactFormElement\PreName;
use MitMarion\TemplateVariables\Partial\ContactFormElement\SurName;

class ContactFormElementsWithoutCustomerDataAndErrorsTemplateVariables extends ContactFormElementsTemplateVariables
{
    public function __construct(
        PreName $preName,
        SurName $surName,
        EMail $eMail,
        CustomerMessage $message,
        DataPrivacy $dataPrivacy
    ) {
        parent::__construct($preName, $surName, $eMail, $message, $dataPrivacy);
    }

    protected function hasErrors(): bool
    {
        return false;
    }
}
