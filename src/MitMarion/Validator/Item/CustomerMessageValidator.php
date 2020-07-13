<?php

declare(strict_types=1);

namespace MitMarion\Validator\Item;


use Shared\TemplateVariables\Form\Element\ErrorMessage;
use Shared\TemplateVariables\Form\Element\ErrorMessages;

class CustomerMessageValidator extends ItemValidator
{
    private const REQUIRED_PARAMETER_CUSTOMERMESSAGE = 'customerMessage';

    public function validate(): ErrorMessages
    {
        $errorMessages = $this->createEmptyErrorMessages();
        if (!$this->request->hasParameter(self::REQUIRED_PARAMETER_CUSTOMERMESSAGE)) {
            $errorMessages->addErrorMessage(new ErrorMessage('Bitte gib deine Nachricht an mich ein.'));

            return $errorMessages;
        }

        return $errorMessages;
    }
}
