<?php

declare(strict_types=1);

namespace MitMarion\Validator\Item;


use Shared\TemplateVariables\Form\Element\ErrorMessage;
use Shared\TemplateVariables\Form\Element\ErrorMessages;

class SurNameValidator extends ItemValidator
{
    private const REQUIRED_PARAMETER_SURNAME = 'surName';

    public function validate(): ErrorMessages
    {
        $errorMessages = $this->createEmptyErrorMessages();
        if (!$this->request->hasParameter(self::REQUIRED_PARAMETER_SURNAME)) {
            $errorMessages->addErrorMessage(new ErrorMessage('Bitte gib deinen Nachnamen ein.'));

            return $errorMessages;
        }

        return $errorMessages;
    }
}
