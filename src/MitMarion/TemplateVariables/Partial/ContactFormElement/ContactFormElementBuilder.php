<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\Partial\ContactFormElement;

use MitMarion\TemplateVariables\Partial\ContactFormElementsWithCustomerDataAndErrorsTemplateVariables;
use MitMarion\TemplateVariables\Partial\ContactFormElementsWithoutCustomerDataAndErrorsTemplateVariables;
use Shared\TemplateVariables\Form\Element\Label;
use Shared\TemplateVariables\Form\Element\OptionalPlaceholder;
use Shared\TemplateVariables\Form\Element\Placeholder;
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
                $this->buildPlaceholderReCaptcha()
            ),
            new PreName(
                $this->buildLabelPreName(),
                $this->buildPlaceholderPreName()
            ),
            new SurName(
                $this->buildLabelSurName(),
                $this->buildPlaceholderSurName()
            ),
            new EMail(
                $this->buildLabelEMail(),
                $this->buildPlaceholderEMail()
            ),
            new CustomerMessage(
                $this->buildLabelCustomerMessage(),
                $this->buildPlaceholderCustomerMessage()
            ),
            new DataPrivacy(
                $this->buildLabelDataPrivacy(),
                $this->buildPlaceholderDataPrivacy()
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
        return new Placeholder('Eine kleine Aufgabe gegen den Spam');
    }

    private function buildPlaceholderPreName(): Placeholder
    {
        return new Placeholder('mein Vorname');
    }

    private function buildPlaceholderSurName(): Placeholder
    {
        return new Placeholder('mein Nachname');
    }

    private function buildPlaceholderEMail(): Placeholder
    {
        return new Placeholder('meine E-Mail Adresse');
    }

    private function buildPlaceholderCustomerMessage(): Placeholder
    {
        return new Placeholder('Meine Nachricht an dich, Marion');
    }

    private function buildPlaceholderDataPrivacy(): OptionalPlaceholder
    {
        return new OptionalPlaceholder();
    }

    /**
     * @return PreNameWithCustomerDataAndErrors
     */
    private function buildPreNameWithCustomerData(ElementResult $preNameResult): ElementWithCustomerData
    {
        if (!$preNameResult->hasErrors()) {
            return new PreNameWithCustomerData(
                $this->buildLabelPreName(),
                $this->buildPlaceholderPreName(),
                $preNameResult->getCustomerInput()
            );
        }

        /** @var ErrorElementResult $preNameResult */
        return new PreNameWithCustomerDataAndErrors(
            $this->buildLabelPreName(),
            $this->buildPlaceholderPreName(),
            $preNameResult->getCustomerInput(),
            $preNameResult->getErrorMessages()
        );
    }

    /**
     * @return ReCaptchaWithCustomerDataAndErrors
     */
    private function buildReCaptchaWithCustomerData(ElementResult $reCaptchaResult): ElementWithCustomerData
    {
        if (!$reCaptchaResult->hasErrors()) {
            return new ReCaptchaWithCustomerData(
                $this->buildLabelReCaptcha(),
                $this->buildPlaceholderReCaptcha(),
                $reCaptchaResult->getCustomerInput()
            );
        }

        /** @var ErrorElementResult $reCaptchaResult */
        return new ReCaptchaWithCustomerDataAndErrors(
            $this->buildLabelReCaptcha(),
            $this->buildPlaceholderReCaptcha(),
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
                $surNameResult->getCustomerInput(),
            );
        }

        /** @var ErrorElementResult $surNameResult */
        return new SurNameWithCustomerDataAndErrors(
            $this->buildLabelSurName(),
            $this->buildPlaceholderSurName(),
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
                $eMailResult->getCustomerInput(),
            );
        }

        /** @var ErrorElementResult $eMailResult */
        return new EMailWithCustomerDataAndErrors(
            $this->buildLabelEMail(),
            $this->buildPlaceholderEMail(),
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
                $customerMessageResult->getCustomerInput(),
            );
        }

        /** @var ErrorElementResult $customerMessageResult */
        return new CustomerMessageWithCustomerDataAndErrors(
            $this->buildLabelCustomerMessage(),
            $this->buildPlaceholderCustomerMessage(),
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
                $dataPrivacyResult->getCustomerInput(),
            );
        }

        /** @var ErrorElementResult $dataPrivacyResult */
        return new DataPrivacyWithCustomerDataAndErrors(
            $this->buildLabelDataPrivacy(),
            $this->buildPlaceholderDataPrivacy(),
            $dataPrivacyResult->getCustomerInput(),
            $dataPrivacyResult->getErrorMessages()
        );
    }
}
