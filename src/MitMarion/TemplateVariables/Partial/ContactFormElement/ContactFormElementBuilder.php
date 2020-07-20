<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\Partial\ContactFormElement;

use MitMarion\TemplateVariables\Partial\ContactFormElementsWithCustomerDataAndErrorsTemplateVariables;
use MitMarion\TemplateVariables\Partial\ContactFormElementsWithoutCustomerDataAndErrorsTemplateVariables;
use Shared\TemplateVariables\Form\Element\Label;
use Shared\TemplateVariables\Form\Element\Placeholder;
use Shared\TemplateVariables\Form\Element\ValidationRegexPattern;
use Shared\TemplateVariables\Form\ElementWithCustomerData;
use Shared\TemplateVariables\TemplateVariables;
use Shared\Validator\Element\ElementResult;
use Shared\Validator\Element\ErrorElementResult;

class ContactFormElementBuilder
{
    public function buildContactFormElementsWithoutCustomerDataAndErrorsTemplateVariables(): TemplateVariables
    {
        return new ContactFormElementsWithoutCustomerDataAndErrorsTemplateVariables(
            new ReCaptcha(
                $this->buildLabelReCaptcha(),
                $this->buildPlaceholderReCaptcha(),
                new ValidationRegexPattern('')
            ),
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
        ElementResult $reCaptchaResult,
        ElementResult $preNameResult,
        ElementResult $surNameResult,
        ElementResult $eMailResult,
        ElementResult $customerMessageResult,
        ElementResult $dataPrivacyResult

    ): TemplateVariables {
        return new ContactFormElementsWithCustomerDataAndErrorsTemplateVariables(
            $this->buildReCaptchaWithCustomerData($reCaptchaResult),
            $this->buildPreNameWithCustomerData($preNameResult),
            $this->buildSurNameWithCustomerData($surNameResult),
            $this->buildEMailWithCustomerData($eMailResult),
            $this->buildCustomerMessageWithCustomerData($customerMessageResult),
            $this->buildDataPrivacyWithCustomerData($dataPrivacyResult),
        );
    }

    private function buildLabelReCaptcha(): Label
    {
        return new Label('Captcha');
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

    private function buildPlaceholderReCaptcha(): Placeholder
    {
        return new Placeholder('eine kleine Aufgabe');
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

    /**
     * @param ElementResult $preNameResult
     *
     * @return PreNameWithCustomerDataAndErrors
     */
    private function buildPreNameWithCustomerData(ElementResult $preNameResult): ElementWithCustomerData
    {
        if (!$preNameResult->hasErrors()) {
            return new PreNameWithCustomerData(
                $this->buildLabelPreName(),
                $this->buildPlaceholderPreName(),
                new ValidationRegexPattern(''),
                $preNameResult->getCustomerInput()
            );
        }

        /** @var ErrorElementResult $preNameResult */
        return new PreNameWithCustomerDataAndErrors(
            $this->buildLabelPreName(),
            $this->buildPlaceholderPreName(),
            new ValidationRegexPattern(''),
            $preNameResult->getCustomerInput(),
            $preNameResult->getErrorMessages()
        );
    }

    /**
     * @param ElementResult $reCaptchaResult
     *
     * @return ReCaptchaWithCustomerDataAndErrors
     */
    private function buildReCaptchaWithCustomerData(ElementResult $reCaptchaResult): ElementWithCustomerData
    {
        if (!$reCaptchaResult->hasErrors()) {
            return new ReCaptchaWithCustomerData(
                $this->buildLabelReCaptcha(),
                $this->buildPlaceholderReCaptcha(),
                new ValidationRegexPattern(''),
                $reCaptchaResult->getCustomerInput()
            );
        }

        /** @var ErrorElementResult $reCaptchaResult */
        return new ReCaptchaWithCustomerDataAndErrors(
            $this->buildLabelReCaptcha(),
            $this->buildPlaceholderReCaptcha(),
            new ValidationRegexPattern(''),
            $reCaptchaResult->getCustomerInput(),
            $reCaptchaResult->getErrorMessages()
        );
    }

    private function buildSurNameWithCustomerData(ElementResult $surNameResult): ElementWithCustomerData
    {
        if (!$surNameResult->hasErrors()) {
            return new SurNameWithCustomerData(
                $this->buildLabelSurName(),
                $this->buildPlaceholderSurName(),
                new ValidationRegexPattern(''),
                $surNameResult->getCustomerInput(),
            );
        }

        /** @var ErrorElementResult $surNameResult */
        return new SurNameWithCustomerDataAndErrors(
            $this->buildLabelSurName(),
            $this->buildPlaceholderSurName(),
            new ValidationRegexPattern(''),
            $surNameResult->getCustomerInput(),
            $surNameResult->getErrorMessages()
        );
    }

    private function buildEMailWithCustomerData(ElementResult $eMailResult): ElementWithCustomerData
    {
        if (!$eMailResult->hasErrors()) {
            return new EMailWithCustomerData(
                $this->buildLabelEMail(),
                $this->buildPlaceholderEMail(),
                new ValidationRegexPattern(''),
                $eMailResult->getCustomerInput(),
            );
        }

        /** @var ErrorElementResult $eMailResult */
        return new EMailWithCustomerDataAndErrors(
            $this->buildLabelEMail(),
            $this->buildPlaceholderEMail(),
            new ValidationRegexPattern(''),
            $eMailResult->getCustomerInput(),
            $eMailResult->getErrorMessages()
        );
    }

    private function buildCustomerMessageWithCustomerData(ElementResult $customerMessageResult): ElementWithCustomerData
    {
        if (!$customerMessageResult->hasErrors()) {
            return new CustomerMessageWithCustomerData(
                $this->buildLabelCustomerMessage(),
                $this->buildPlaceholderCustomerMessage(),
                new ValidationRegexPattern(''),
                $customerMessageResult->getCustomerInput(),
            );
        }

        /** @var ErrorElementResult $customerMessageResult */
        return new CustomerMessageWithCustomerDataAndErrors(
            $this->buildLabelCustomerMessage(),
            $this->buildPlaceholderCustomerMessage(),
            new ValidationRegexPattern(''),
            $customerMessageResult->getCustomerInput(),
            $customerMessageResult->getErrorMessages()
        );
    }

    private function buildDataPrivacyWithCustomerData(ElementResult $dataPrivacyResult): ElementWithCustomerData
    {
        if (!$dataPrivacyResult->hasErrors()) {
            return new DataPrivacyWithCustomerData(
                $this->buildLabelDataPrivacy(),
                $this->buildPlaceholderDataPrivacy(),
                new ValidationRegexPattern(''),
                $dataPrivacyResult->getCustomerInput(),
            );
        }

        /** @var ErrorElementResult $dataPrivacyResult */
        return new DataPrivacyWithCustomerDataAndErrors(
            $this->buildLabelDataPrivacy(),
            $this->buildPlaceholderDataPrivacy(),
            new ValidationRegexPattern(''),
            $dataPrivacyResult->getCustomerInput(),
            $dataPrivacyResult->getErrorMessages()
        );
    }
}
