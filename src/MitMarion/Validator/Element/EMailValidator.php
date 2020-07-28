<?php

declare(strict_types=1);

namespace MitMarion\Validator\Element;


use Shared\ValueObject\Base\Identifier;
use Shared\TemplateVariables\Form\Element\CustomerInput;
use Shared\TemplateVariables\Form\Element\ErrorMessage;
use Shared\Validator\Element\ErrorElementResult;
use Shared\Validator\Element\ElementResult;
use Shared\Validator\Element\ElementValidator;

class EMailValidator extends ElementValidator
{
    private const PARAMETER_NAME = 'eMail';

    public function validate(): ElementResult
    {
        $errorMessages = $this->createEmptyErrorMessages();
        if (!$this->hasValue()) {
            $errorMessages->addErrorMessage(new ErrorMessage('Bitte gib deine E-Mail Adresse ein.'));

            return new ErrorElementResult(CustomerInput::createEmpty(), $errorMessages);
        }
        if (!$this->isValidEmail()) {
            $errorMessages->addErrorMessage(new ErrorMessage('Die E-Mail Adresse scheint fehlerhaft zu sein.'));
        }
        if (!$errorMessages->isEmpty()) {
            return $this->createErrorResultWithCustomerInput($errorMessages);
        }

        return $this->createSuccessResult();
    }

    protected function getParameterIdentifier(): Identifier
    {
        return new Identifier(self::PARAMETER_NAME);
    }
}
