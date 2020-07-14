<?php
declare(strict_types=1);

namespace MitMarion\Validator;

use MitMarion\TemplateVariables\Partial\ContactFormElement\ContactFormElementBuilder;
use MitMarion\Validator\Item\CustomerMessageValidator;
use MitMarion\Validator\Item\DataPrivacyValidator;
use MitMarion\Validator\Item\EMailValidator;
use MitMarion\Validator\Item\PreNameValidator;
use MitMarion\Validator\Item\SurNameValidator;
use Shared\Validator\Element\ElementResult;
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
        $preNameResult = $this->preNameValidator->validate();
        $surNameResult = $this->surNameValidator->validate();
        $eMailResult = $this->eMailValidator->validate();
        $customerMessageResult = $this->customerMessageValidator->validate();
        $dataPrivacyResult = $this->dataPrivacyValidator->validate();

        if (!$this->hasErrors(
            $preNameResult,
            $surNameResult,
            $eMailResult,
            $customerMessageResult,
            $dataPrivacyResult
        )) {
            return new SuccessResult();
        }

        return new ContactFormWithCustomerDataAndErrorsResult(
            $this->formElementBuilder->buildContactFormElementsWithCustomerDataAndErrorsTemplateVariables(
                $preNameResult,
                $surNameResult,
                $eMailResult,
                $customerMessageResult,
                $dataPrivacyResult
            )
        );
    }

    private function hasErrors(
        ElementResult $preNameResult,
        ElementResult $surNameResult,
        ElementResult $eMailResult,
        ElementResult $customerMessageResult,
        ElementResult $dataPrivacyResult
    ): bool {
        return $preNameResult->hasErrors()
            || $surNameResult->hasErrors()
            || $eMailResult->hasErrors()
            || $customerMessageResult->hasErrors()
            || $dataPrivacyResult->hasErrors();
    }
}
