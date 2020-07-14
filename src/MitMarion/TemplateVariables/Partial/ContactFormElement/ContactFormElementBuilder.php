<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\Partial\ContactFormElement;

use MitMarion\TemplateVariables\Partial\ContactFormElementsWithCustomerDataAndErrorsTemplateVariables;
use MitMarion\TemplateVariables\Partial\ContactFormElementsWithoutCustomerDataAndErrorsTemplateVariables;
use Shared\TemplateVariables\Form\Element\CustomerInput;
use Shared\TemplateVariables\Form\Element\ErrorMessages;
use Shared\TemplateVariables\Form\Element\Label;
use Shared\TemplateVariables\Form\Element\Placeholder;
use Shared\TemplateVariables\Form\Element\ValidationRegexPattern;
use Shared\TemplateVariables\TemplateVariables;

class ContactFormElementBuilder
{
    public function buildContactFormElementsWithoutCustomerDataAndErrorsTemplateVariables(): TemplateVariables
    {
        return new ContactFormElementsWithoutCustomerDataAndErrorsTemplateVariables(
            new PreName(
                $this->buildLabelPreName(),
                $this->buildPlaceholderPreName(),
                new ValidationRegexPattern('')
            ),
            new SurName(
                $this->buildLabelSurName(),
                $this->buildPlaceholderSurName(),
                new ValidationRegexPattern('')
            ),
            new EMail(
                $this->buildLabelEMail(),
                $this->buildPlaceholderEMail(),
                new ValidationRegexPattern('')
            ),
            new CustomerMessage(
                $this->buildLabelCustomerMessage(),
                $this->buildPlaceholderCustomerMessage(),
                new ValidationRegexPattern('')
            ),
            new DataPrivacy(
                $this->buildLabelDataPrivacy(),
                $this->buildPlaceholderDataPrivacy(),
                new ValidationRegexPattern('')
            ),
        );
    }

    public function buildContactFormElementsWithCustomerDataAndErrorsTemplateVariables(
        ErrorMessages $preNameErrorMessages,
        ErrorMessages $surNameErrorMessages,
        ErrorMessages $eMailErrorMessages,
        ErrorMessages $customerMessageErrorMessages,
        ErrorMessages $dataPrivacyErrorMessages

    ): TemplateVariables {
        return new ContactFormElementsWithCustomerDataAndErrorsTemplateVariables(
            new PreNameWithCustomerDataAndErrors(
                $this->buildLabelPreName(),
                $this->buildPlaceholderPreName(),
                new ValidationRegexPattern(''),
                new CustomerInput('falscher input'),
                $preNameErrorMessages
            ),

            new SurNameWithCustomerDataAndErrors(
                $this->buildLabelSurName(),
                $this->buildPlaceholderSurName(),
                new ValidationRegexPattern(''),
                new CustomerInput('falscher input in $surName'),
                $surNameErrorMessages
            ),

            new EMailWithCustomerDataAndErrors(
                $this->buildLabelEMail(),
                $this->buildPlaceholderEMail(),
                new ValidationRegexPattern(''),
                new CustomerInput('falscher input in $eMail'),
                $eMailErrorMessages
            ),

            new CustomerMessageWithCustomerDataAndErrors(
                $this->buildLabelCustomerMessage(),
                $this->buildPlaceholderCustomerMessage(),
                new ValidationRegexPattern(''),
                new CustomerInput('falscher input in $message'),
                $customerMessageErrorMessages
            ),

            new DataPrivacyWithCustomerDataAndErrors(
                $this->buildLabelDataPrivacy(),
                $this->buildPlaceholderDataPrivacy(),
                new ValidationRegexPattern(''),
                new CustomerInput('falscher input in $dataPrivacy'),
                $dataPrivacyErrorMessages
            ),
        );
    }

    private function buildLabelPreName(): Label
    {
        return new Label('Vorname');
    }

    private function buildLabelSurName(): Label
    {
        return new Label('Nachname');
    }

    private function buildLabelEMail(): Label
    {
        return new Label('E-Mail');
    }

    private function buildLabelCustomerMessage(): Label
    {
        return new Label('Nachricht');
    }

    private function buildLabelDataPrivacy(): Label
    {
        return new Label('dataPrivacy');
    }

    private function buildPlaceholderPreName(): Placeholder
    {
        return new Placeholder('dein Vorname');
    }

    private function buildPlaceholderSurName(): Placeholder
    {
        return new Placeholder('dein Nachname');
    }

    private function buildPlaceholderEMail(): Placeholder
    {
        return new Placeholder('deine E-Mail Adresse');
    }

    private function buildPlaceholderCustomerMessage(): Placeholder
    {
        return new Placeholder('Meine Nachricht an dich, Marion');
    }

    private function buildPlaceholderDataPrivacy(): Placeholder
    {
        return new Placeholder('Ich habe die Datenschutzerklärung gelesen und akzeptiere sie.');
    }
}
