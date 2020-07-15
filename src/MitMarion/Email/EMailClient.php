<?php

declare(strict_types=1);

namespace MitMarion\Email;

use MitMarion\Http\Request;
use MitMarion\Validator\ValidatedContactFormData;
use Shared\Email\EMailClient as SharedEmailClient;

class EMailClient extends SharedEmailClient
{
    /**
     * @var ValidatedContactFormData
     */
    private $validatedContactFormData;

    public function __construct(ValidatedContactFormData $validatedContactFormData)
    {
        parent::__construct();
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
            "Nachricht:\n%s\n\nDatenschutz: %s",
            $this->validatedContactFormData->getCustomerInputCustomerMessage()->getValue(),
            $this->validatedContactFormData->getCustomerInputDataPrivacy()->getValue()
        );

        return $this->sendMail(
            $contactCaption,
            $this->validatedContactFormData->getCustomerInputEMail()->getValue(),
            'mit-marion.de',
//            'raus@mit-marion.de',
            'reinhard.westermann@googlemail.com',
            sprintf('[Kontaktformular] %s', $contactCaption),
            $mailText
        );
    }
}
