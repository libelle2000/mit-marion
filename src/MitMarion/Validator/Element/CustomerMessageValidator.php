<?php

declare(strict_types=1);

namespace MitMarion\Validator\Element;


use Shared\BaseValueObject\Identifier;
use Shared\TemplateVariables\Form\Element\CustomerInput;
use Shared\TemplateVariables\Form\Element\ErrorMessage;
use Shared\Validator\Element\ErrorElementResult;
use Shared\Validator\Element\ElementResult;

class CustomerMessageValidator extends ItemValidator
{
    private const PARAMETER_NAME = 'customerMessage';

    public function validate(): ElementResult
    {
        $errorMessages = $this->createEmptyErrorMessages();
        if (!$this->isSetRule()) {
            $errorMessages->addErrorMessage(new ErrorMessage('Bitte gib deine Nachricht an mich ein.'));

            return new ErrorElementResult(CustomerInput::createEmpty(), $errorMessages);
        }

        return $this->createSuccessResult();
    }

    protected function getParameterIdentifier(): Identifier
    {
        return new Identifier(self::PARAMETER_NAME);
    }
}
