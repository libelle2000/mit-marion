<?php
declare(strict_types=1);

namespace MitMarion\Validator;

use MitMarion\TemplateVariables\Partial\ContactFormElement\CustomerMessageWithCustomerDataAndErrors;
use MitMarion\TemplateVariables\Partial\ContactFormElement\DataPrivacyWithCustomerDataAndErrors;
use MitMarion\TemplateVariables\Partial\ContactFormElement\EMailWithCustomerDataAndErrors;
use MitMarion\TemplateVariables\Partial\ContactFormElement\PreNameWithCustomerDataAndErrors;
use MitMarion\TemplateVariables\Partial\ContactFormElement\SurNameWithCustomerDataAndErrors;
use MitMarion\TemplateVariables\Partial\ContactFormElementsWithCustomerDataAndErrorsTemplateVariables;
use MitMarion\Validator\Item\CustomerMessageValidator;
use MitMarion\Validator\Item\DataPrivacyValidator;
use MitMarion\Validator\Item\EMailValidator;
use MitMarion\Validator\Item\PreNameValidator;
use MitMarion\Validator\Item\SurNameValidator;
use Shared\TemplateVariables\Form\Element\CustomerInput;
use Shared\TemplateVariables\Form\Element\ErrorMessages;
use Shared\TemplateVariables\Form\Element\Label;
use Shared\TemplateVariables\Form\Element\Placeholder;
use Shared\TemplateVariables\Form\Element\ValidationRegexPattern;
use Shared\TemplateVariables\Form\FormElementBuilder;
use Shared\Validator\SuccessResult;
use Shared\Validator\Validator;
use Shared\Validator\Result;

class ContactFormValidator implements Validator
{
    /**
     * @var FormElementBuilder
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
        FormElementBuilder $formElementBuilder,
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
            new ContactFormElementsWithCustomerDataAndErrorsTemplateVariables(
                new PreNameWithCustomerDataAndErrors(
                    new Label('Vorname'),
                    new Placeholder('dein Vorname'),
                    new ValidationRegexPattern(''),
                    new CustomerInput('falscher input'),
                    $preNameErrorMessages
                ),

                new SurNameWithCustomerDataAndErrors(
                    new Label('Nachname'),
                    new Placeholder('dein Nachname'),
                    new ValidationRegexPattern(''),
                    new CustomerInput('falscher input in $surName'),
                    $surNameErrorMessages
                ),

                new EMailWithCustomerDataAndErrors(
                    new Label('E-Mail'),
                    new Placeholder('deine E-Mail Adresse'),
                    new ValidationRegexPattern(''),
                    new CustomerInput('falscher input in $eMail'),
                    $eMailErrorMessages
                ),

                new CustomerMessageWithCustomerDataAndErrors(
                    new Label('Nachricht'),
                    new Placeholder('Meine Nachricht an dich, Marion'),
                    new ValidationRegexPattern(''),
                    new CustomerInput('falscher input in $message'),
                    $customerMessageErrorMessages
                ),

                new DataPrivacyWithCustomerDataAndErrors(
                    new Label('dataPrivacy'),
                    new Placeholder('Ich habe die Datenschutzerklärung gelesen und akzeptiere sie.'),
                    new ValidationRegexPattern(''),
                    new CustomerInput('falscher input in $dataPrivacy'),
                    $dataPrivacyErrorMessages
                ),
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
