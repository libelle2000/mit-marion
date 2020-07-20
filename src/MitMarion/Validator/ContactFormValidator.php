<?php
declare(strict_types=1);

namespace MitMarion\Validator;

use MitMarion\TemplateVariables\Partial\ContactFormElement\ContactFormElementBuilder;
use MitMarion\Validator\Element\CustomerMessageValidator;
use MitMarion\Validator\Element\DataPrivacyValidator;
use MitMarion\Validator\Element\EMailValidator;
use MitMarion\Validator\Element\PreNameValidator;
use MitMarion\Validator\Element\ReCaptchaValidator;
use MitMarion\Validator\Element\SurNameValidator;
use Shared\Validator\Element\ElementResult;
use Shared\Validator\Validator;
use Shared\Validator\Result;

class ContactFormValidator implements Validator
{
    /**
     * @var ContactFormElementBuilder
     */
    private $formElementBuilder;
    /**
     * @var ReCaptchaValidator
     */
    private $reCaptchaValidator;
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
        ReCaptchaValidator $reCaptchaValidator,
        PreNameValidator $preNameValidator,
        SurNameValidator $surNameValidator,
        EMailValidator $eMailValidator,
        CustomerMessageValidator $customerMessageValidator,
        DataPrivacyValidator $dataPrivacyValidator
    ) {
        $this->formElementBuilder = $formElementBuilder;
        $this->reCaptchaValidator = $reCaptchaValidator;
        $this->preNameValidator = $preNameValidator;
        $this->surNameValidator = $surNameValidator;
        $this->eMailValidator = $eMailValidator;
        $this->customerMessageValidator = $customerMessageValidator;
        $this->dataPrivacyValidator = $dataPrivacyValidator;
    }

    public function validate(): Result
    {
        $reCaptchaResult = $this->reCaptchaValidator->validate();
        $preNameResult = $this->preNameValidator->validate();
        $surNameResult = $this->surNameValidator->validate();
        $eMailResult = $this->eMailValidator->validate();
        $customerMessageResult = $this->customerMessageValidator->validate();
        $dataPrivacyResult = $this->dataPrivacyValidator->validate();

        if (!$this->hasErrors(
            $reCaptchaResult,
            $preNameResult,
            $surNameResult,
            $eMailResult,
            $customerMessageResult,
            $dataPrivacyResult
        )) {
            return new ContactFormWithCustomerDataSuccessResult(
                new ValidatedContactFormData(
                    $preNameResult->getCustomerInput(),
                    $surNameResult->getCustomerInput(),
                    $eMailResult->getCustomerInput(),
                    $customerMessageResult->getCustomerInput(),
                    $dataPrivacyResult->getCustomerInput()
                )
            );
        }

        return new ContactFormWithCustomerDataAndErrorsResult(
            $this->formElementBuilder->buildContactFormElementsWithCustomerDataAndErrorsTemplateVariables(
                $reCaptchaResult,
                $preNameResult,
                $surNameResult,
                $eMailResult,
                $customerMessageResult,
                $dataPrivacyResult
            )
        );
    }

    private function hasErrors(
        ElementResult $reCaptchaResult,
        ElementResult $preNameResult,
        ElementResult $surNameResult,
        ElementResult $eMailResult,
        ElementResult $customerMessageResult,
        ElementResult $dataPrivacyResult
    ): bool {
        return
            $reCaptchaResult->hasErrors()
            || $preNameResult->hasErrors()
            || $surNameResult->hasErrors()
            || $eMailResult->hasErrors()
            || $customerMessageResult->hasErrors()
            || $dataPrivacyResult->hasErrors();
    }
}
