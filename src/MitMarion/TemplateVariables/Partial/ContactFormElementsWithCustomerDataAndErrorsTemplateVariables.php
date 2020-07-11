<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\Partial;

use MitMarion\TemplateVariables\Partial\ContactFormElement\CustomerMessageWithCustomerDataAndErrors;
use MitMarion\TemplateVariables\Partial\ContactFormElement\DataPrivacyWithCustomerDataAndErrors;
use MitMarion\TemplateVariables\Partial\ContactFormElement\EMailWithCustomerDataAndErrors;
use MitMarion\TemplateVariables\Partial\ContactFormElement\PreNameWithCustomerDataAndErrors;
use MitMarion\TemplateVariables\Partial\ContactFormElement\SurNameWithCustomerDataAndErrors;
use MitMarion\TemplateVariables\TemplateVariables;

class ContactFormElementsWithCustomerDataAndErrorsTemplateVariables implements TemplateVariables
{
    /**
     * @var PreNameWithCustomerDataAndErrors
     */
    private $preName;
    /**
     * @var SurNameWithCustomerDataAndErrors
     */
    private $surName;
    /**
     * @var EMailWithCustomerDataAndErrors
     */
    private $eMail;
    /**
     * @var CustomerMessageWithCustomerDataAndErrors
     */
    private $message;
    /**
     * @var DataPrivacyWithCustomerDataAndErrors
     */
    private $dataPrivacy;

    public function __construct(
        PreNameWithCustomerDataAndErrors $preName,
        SurNameWithCustomerDataAndErrors $surName,
        EMailWithCustomerDataAndErrors $eMail,
        CustomerMessageWithCustomerDataAndErrors $message,
        DataPrivacyWithCustomerDataAndErrors $dataPrivacy
    ) {
        $this->preName = $preName;
        $this->surName = $surName;
        $this->eMail = $eMail;
        $this->message = $message;
        $this->dataPrivacy = $dataPrivacy;
    }

    public function asAssocArray(): array
    {
        return array_merge_recursive(
            $this->preName->asAssocArray(),
            $this->surName->asAssocArray(),
            $this->eMail->asAssocArray(),
            $this->message->asAssocArray(),
            $this->dataPrivacy->asAssocArray(),
        );
    }
}
