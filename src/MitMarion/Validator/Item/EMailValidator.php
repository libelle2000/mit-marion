<?php

declare(strict_types=1);

namespace MitMarion\Validator\Item;


use Shared\TemplateVariables\Form\Element\ErrorMessage;
use Shared\TemplateVariables\Form\Element\ErrorMessages;

class EMailValidator extends ItemValidator
{
    private const REQUIRED_PARAMETER_EMAIL = 'eMail';

    public function validate(): ErrorMessages
    {
        $errorMessages = $this->createEmptyErrorMessages();
        if (!$this->request->hasParameter(self::REQUIRED_PARAMETER_EMAIL)) {
            $errorMessages->addErrorMessage(new ErrorMessage('Bitte gib deine E-Mail Adresse ein.'));

            return $errorMessages;
        }

        return $errorMessages;
    }
}
