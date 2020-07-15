<?php

declare(strict_types=1);

namespace MitMarion\Validator\Element;


use Shared\BaseValueObject\Identifier;
use Shared\TemplateVariables\Form\Element\CustomerInput;
use Shared\TemplateVariables\Form\Element\ErrorMessage;
use Shared\Validator\Element\ErrorElementResult;
use Shared\Validator\Element\ElementResult;
use Shared\Validator\Element\ElementValidator;

class DataPrivacyValidator extends ElementValidator
{
    private const PARAMETER_NAME = 'dataPrivacy';
    private const PARAMETER_VALUE = 'accepted';

    public function validate(): ElementResult
    {
        $errorMessages = $this->createEmptyErrorMessages();
        if (
            (!$this->hasValue())
            || (!$this->getParameterValue()->isEqualToValue(self::PARAMETER_VALUE))
        ) {
            $errorMessages->addErrorMessage(new ErrorMessage('Bitte akzeptiere die Datenschutzerklärung.'));

            return new ErrorElementResult(CustomerInput::createEmpty(), $errorMessages);
        }

        return $this->createSuccessResult();
    }

    protected function getParameterIdentifier(): Identifier
    {
        return new Identifier(self::PARAMETER_NAME);
    }
}
