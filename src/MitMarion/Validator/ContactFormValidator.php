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

    public function __construct(private readonly ContactFormElementBuilder $formElementBuilder, private readonly ReCaptchaValidator $reCaptchaValidator, private readonly PreNameValidator $preNameValidator, private readonly SurNameValidator $surNameValidator, private readonly EMailValidator $eMailValidator, private readonly CustomerMessageValidator $customerMessageValidator, private readonly DataPrivacyValidator $dataPrivacyValidator)
    {
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

    private function hasErrors(ElementResult $reCaptchaResult, ElementResult $preNameResult, ElementResult $surNameResult, ElementResult $eMailResult, ElementResult $customerMessageResult, ElementResult $dataPrivacyResult): bool
    {
        if ($reCaptchaResult->hasErrors()) {
            return true;
        }
        if ($preNameResult->hasErrors()) {
            return true;
        }
        if ($surNameResult->hasErrors()) {
            return true;
        }
        if ($eMailResult->hasErrors()) {
            return true;
        }
        if ($customerMessageResult->hasErrors()) {
            return true;
        }
        return $dataPrivacyResult->hasErrors();
    }
}
