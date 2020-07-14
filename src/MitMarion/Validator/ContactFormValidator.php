<?php
declare(strict_types=1);

namespace MitMarion\Validator;

use MitMarion\TemplateVariables\Partial\ContactFormElement\ContactFormElementBuilder;
use MitMarion\Validator\Item\CustomerMessageValidator;
use MitMarion\Validator\Item\DataPrivacyValidator;
use MitMarion\Validator\Item\EMailValidator;
use MitMarion\Validator\Item\PreNameValidator;
use MitMarion\Validator\Item\SurNameValidator;
use Shared\TemplateVariables\Form\Element\ErrorMessages;
use Shared\Validator\SuccessResult;
use Shared\Validator\Validator;
use Shared\Validator\Result;

class ContactFormValidator implements Validator
{
    /**
     * @var ContactFormElementBuilder
     */
    private $formElementBuilder;
    /**
     * @var PreNameValidator
     */
    private $preNameValidator;
    /**
     * @var SurNameValidator
     */
    private $surNameValidator;
    /**
     * @var EMailValidator
     */
    private $eMailValidator;
    /**
     * @var CustomerMessageValidator
     */
    private $customerMessageValidator;
    /**
     * @var DataPrivacyValidator
     */
    private $dataPrivacyValidator;

    public function __construct(
        ContactFormElementBuilder $formElementBuilder,
        PreNameValidator $preNameValidator,
        SurNameValidator $surNameValidator,
        EMailValidator $eMailValidator,
        CustomerMessageValidator $customerMessageValidator,
        DataPrivacyValidator $dataPrivacyValidator
    ) {
        $this->formElementBuilder = $formElementBuilder;
        $this->preNameValidator = $preNameValidator;
        $this->surNameValidator = $surNameValidator;
        $this->eMailValidator = $eMailValidator;
        $this->customerMessageValidator = $customerMessageValidator;
        $this->dataPrivacyValidator = $dataPrivacyValidator;
    }

    public function validate(): Result
    {
        $preNameErrorMessages = $this->preNameValidator->validate();
        $surNameErrorMessages = $this->surNameValidator->validate();
        $eMailErrorMessages = $this->eMailValidator->validate();
        $customerMessageErrorMessages = $this->customerMessageValidator->validate();
        $dataPrivacyErrorMessages = $this->dataPrivacyValidator->validate();

        if ($this->noErrors(
            $preNameErrorMessages,
            $surNameErrorMessages,
            $eMailErrorMessages,
            $customerMessageErrorMessages,
            $dataPrivacyErrorMessages
        )) {
            return new SuccessResult();
        }

        return new ContactFormWithCustomerDataAndErrorsResult(
            $this->formElementBuilder->buildContactFormElementsWithCustomerDataAndErrorsTemplateVariables(
                $preNameErrorMessages,
                $surNameErrorMessages,
                $eMailErrorMessages,
                $customerMessageErrorMessages,
                $dataPrivacyErrorMessages
            )
        );
    }

    private function noErrors(
        ErrorMessages $preNameErrorMessages,
        ErrorMessages $surNameErrorMessages,
        ErrorMessages $eMailErrorMessages,
        ErrorMessages $customerMessageErrorMessages,
        ErrorMessages $dataPrivacyErrorMessages
    ): bool {
        return $preNameErrorMessages->isEmpty()
            && $surNameErrorMessages->isEmpty()
            && $eMailErrorMessages->isEmpty()
            && $customerMessageErrorMessages->isEmpty()
            && $dataPrivacyErrorMessages->isEmpty();
    }
}
