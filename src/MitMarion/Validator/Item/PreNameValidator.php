<?php

declare(strict_types=1);

namespace MitMarion\Validator\Item;


use Shared\TemplateVariables\Form\Element\ErrorMessage;
use Shared\TemplateVariables\Form\Element\ErrorMessages;

class PreNameValidator extends ItemValidator
{
    private const REQUIRED_PARAMETER_PRENAME = 'preName';

    public function validate(): ErrorMessages
    {
        $errorMessages = $this->createEmptyErrorMessages();
        if (!$this->request->hasParameter(self::REQUIRED_PARAMETER_PRENAME)) {
            $errorMessages->addErrorMessage(new ErrorMessage('Bitte gib deinen Vornamen ein.'));

            return $errorMessages;
        }

        return $errorMessages;
    }
}
