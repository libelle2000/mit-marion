<?php

declare(strict_types=1);

namespace MitMarion\Validator\Element;

use Shared\ValueObject\Base\Identifier;
use Shared\TemplateVariables\Form\Element\CustomerInput;
use Shared\TemplateVariables\Form\Element\ErrorMessage;
use Shared\Validator\Element\ErrorElementResult;
use Shared\Validator\Element\ElementResult;
use Shared\Validator\Element\ElementValidator;

class SurNameValidator extends ElementValidator
{
    private const PARAMETER_NAME = 'surName';

    public function validate(): ElementResult
    {
        $errorMessages = $this->createEmptyErrorMessages();
        if (!$this->hasValue()) {
            $errorMessages->addErrorMessage(new ErrorMessage('Bitte gib deinen Nachnamen ein.'));

            return new ErrorElementResult(CustomerInput::createEmpty(), $errorMessages);
        }
        if (!$this->isValidName()) {
            $errorMessages->addErrorMessage(
                new ErrorMessage(
                    sprintf(
                        'Dein Nachname enthält unerlaubte Sonderzeichen. Erlaubt sind:%s%s',
                        "\n",
                        implode(' ', self::REGEX_PATTERN_NAME)
                    )
                )
            );
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
