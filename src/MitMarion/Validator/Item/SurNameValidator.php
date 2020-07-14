<?php

declare(strict_types=1);

namespace MitMarion\Validator\Item;


use Shared\TemplateVariables\Form\Element\CustomerInput;
use Shared\TemplateVariables\Form\Element\ErrorMessage;
use Shared\Validator\Element\ErrorElementResult;
use Shared\Validator\Element\ElementResult;

class SurNameValidator extends ItemValidator
{
    private const PARAMETER_NAME = 'surName';

    public function validate(): ElementResult
    {
        $errorMessages = $this->createEmptyErrorMessages();
        if (!$this->isSetRule()) {
            $errorMessages->addErrorMessage(new ErrorMessage('Bitte gib deinen Nachnamen ein.'));

            return new ErrorElementResult(CustomerInput::createEmpty(), $errorMessages);
        }

        return $this->createSuccessResult();
    }

    protected function getParameterIdentifier(): string
    {
        return self::PARAMETER_NAME;
    }
}
