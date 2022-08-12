<?php

declare(strict_types=1);

namespace MitMarion\Email;

use MitMarion\Validator\ValidatedContactFormData;
use Shared\Email\EMailClient as SharedEmailClient;
use Shared\Email\SenderCaption;
use Shared\Email\SenderEmail;

class EMailClient extends SharedEmailClient
{
    private ValidatedContactFormData $validatedContactFormData;

    public function __construct(
        SenderCaption $senderCaption,
        SenderEmail $senderEmail,
        ValidatedContactFormData $validatedContactFormData
    ) {
        parent::__construct($senderCaption, $senderEmail);
        $this->validatedContactFormData = $validatedContactFormData;
    }

    public function send(): bool
    {
        $contactCaption = sprintf(
            '%s %s',
            $this->validatedContactFormData->getCustomerInputPreName()->getValue(),
            $this->validatedContactFormData->getCustomerInputSurName()->getValue()
        );
        $mailText = sprintf(
            "Nachricht:\n%s\n\nDatenschutz: %s\n\nVorname: %s\n\nNachname: %s\n\nE-Mail Adresse: %s",
            $this->validatedContactFormData->getCustomerInputCustomerMessage()->getValue(),
            $this->validatedContactFormData->getCustomerInputDataPrivacy()->getValue(),
            $this->validatedContactFormData->getCustomerInputPreName()->getValue(),
            $this->validatedContactFormData->getCustomerInputSurName()->getValue(),
            $this->validatedContactFormData->getCustomerInputEMail()->getValue()
        );

        return $this->sendMail(
            $this->getSenderCaption()->getValue(),
//            $this->getSenderEmail()->getValue(),
            'westermann.marion@web.de',
            sprintf('[Kontaktformular] %s', $contactCaption),
            $mailText
        );
    }
}
