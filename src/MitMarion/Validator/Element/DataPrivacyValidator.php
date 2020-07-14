<?php

declare(strict_types=1);

namespace MitMarion\Validator\Element;


use Shared\TemplateVariables\Form\Element\CustomerInput;
use Shared\TemplateVariables\Form\Element\ErrorMessage;
use Shared\Validator\Element\ErrorElementResult;
use Shared\Validator\Element\ElementResult;

class DataPrivacyValidator extends ItemValidator
{
    private const PARAMETER_NAME = 'dataPrivacy';

    public function validate(): ElementResult
    {
        $errorMessages = $this->createEmptyErrorMessages();
        if (!$this->isSetRule()) {
            $errorMessages->addErrorMessage(new ErrorMessage('Bitte akzeptiere die Datenschutzerklärung.'));

            return new ErrorElementResult(CustomerInput::createEmpty(), $errorMessages);
        }

        return $this->createSuccessResult();
    }

    protected function getParameterIdentifier(): string
    {
        return self::PARAMETER_NAME;
    }
}
