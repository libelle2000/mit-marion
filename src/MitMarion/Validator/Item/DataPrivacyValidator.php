<?php

declare(strict_types=1);

namespace MitMarion\Validator\Item;


use Shared\TemplateVariables\Form\Element\ErrorMessage;
use Shared\TemplateVariables\Form\Element\ErrorMessages;

class DataPrivacyValidator extends ItemValidator
{
    private const REQUIRED_PARAMETER_DATAPRIVACY = 'dataPrivacy';

    public function validate(): ErrorMessages
    {
        $errorMessages = $this->createEmptyErrorMessages();
        if (!$this->request->hasParameter(self::REQUIRED_PARAMETER_DATAPRIVACY)) {
            $errorMessages->addErrorMessage(new ErrorMessage('Bitte akzeptiere die Datenschutzerklärung.'));

            return $errorMessages;
        }

        return $errorMessages;
    }
}
