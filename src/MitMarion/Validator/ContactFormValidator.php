<?php
declare(strict_types=1);

namespace MitMarion\Validator;

use MitMarion\TemplateVariables\Partial\ContactFormElement\CustomerMessageWithCustomerDataAndErrors;
use MitMarion\TemplateVariables\Partial\ContactFormElement\DataPrivacyWithCustomerDataAndErrors;
use MitMarion\TemplateVariables\Partial\ContactFormElement\EMailWithCustomerDataAndErrors;
use MitMarion\TemplateVariables\Partial\ContactFormElement\PreNameWithCustomerDataAndErrors;
use MitMarion\TemplateVariables\Partial\ContactFormElement\SurNameWithCustomerDataAndErrors;
use MitMarion\TemplateVariables\Partial\ContactFormElementsWithCustomerDataAndErrorsTemplateVariables;
use Shared\TemplateVariables\Form\Element\CustomerInput;
use Shared\TemplateVariables\Form\Element\ErrorMessage;
use Shared\TemplateVariables\Form\Element\ErrorMessages;
use Shared\TemplateVariables\Form\Element\Label;
use Shared\TemplateVariables\Form\Element\Placeholder;
use Shared\TemplateVariables\Form\Element\ValidationRegexPattern;
use Shared\Validator\Validator;
use Shared\Validator\Result;

class ContactFormValidator implements Validator
{
    public function validate(): Result
    {
        //todo do validation
        $preNameErrorMessages = new ErrorMessages();
        $preNameErrorMessages->addErrorMessage(new ErrorMessage('ein error'));

        $surNameErrorMessages = new ErrorMessages();
        $surNameErrorMessages->addErrorMessage(new ErrorMessage('ein error in $surName'));

        $eMailErrorMessages = new ErrorMessages();
        $eMailErrorMessages->addErrorMessage(new ErrorMessage('ein error in $eMail'));

        $messageErrorMessages = new ErrorMessages();
        $messageErrorMessages->addErrorMessage(new ErrorMessage('ein error in $message'));

        $dataPrivacyErrorMessages = new ErrorMessages();
        $dataPrivacyErrorMessages->addErrorMessage(new ErrorMessage('ein error in $dataPrivacy'));

        return new ContactFormResult(
            new ContactFormElementsWithCustomerDataAndErrorsTemplateVariables(
                new PreNameWithCustomerDataAndErrors(
                    new Label('Vorname'),
                    new Placeholder('dein Vorname'),
                    new ValidationRegexPattern(''),
                    new CustomerInput('falscher input'),
                    $preNameErrorMessages
                ),

                new SurNameWithCustomerDataAndErrors(
                    new Label('surName'),
                    new Placeholder('dein $surName'),
                    new ValidationRegexPattern(''),
                    new CustomerInput('falscher input in $surName'),
                    $surNameErrorMessages
                ),

                new EMailWithCustomerDataAndErrors(
                    new Label('eMail'),
                    new Placeholder('dein $eMail'),
                    new ValidationRegexPattern(''),
                    new CustomerInput('falscher input in $eMail'),
                    $eMailErrorMessages
                ),

                new CustomerMessageWithCustomerDataAndErrors(
                    new Label('message'),
                    new Placeholder('dein $message'),
                    new ValidationRegexPattern(''),
                    new CustomerInput('falscher input in $message'),
                    $messageErrorMessages
                ),

                new DataPrivacyWithCustomerDataAndErrors(
                    new Label('dataPrivacy'),
                    new Placeholder('dein $dataPrivacy'),
                    new ValidationRegexPattern(''),
                    new CustomerInput('falscher input in $dataPrivacy'),
                    $dataPrivacyErrorMessages
                ),
            )
        );
    }
}
