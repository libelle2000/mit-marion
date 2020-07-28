<?php

declare(strict_types=1);

namespace MitMarion\Validator\Element;


use Shared\ValueObject\Base\Identifier;
use Shared\TemplateVariables\Form\Element\ErrorMessage;
use Shared\Validator\Element\ElementResult;
use Shared\Validator\Element\ElementValidator;

class CustomerMessageValidator extends ElementValidator
{
    private const PARAMETER_NAME = 'customerMessage';

    public function validate(): ElementResult
    {
        $errorMessages = $this->createEmptyErrorMessages();
        if (!$this->hasValue()) {
            $errorMessages->addErrorMessage(new ErrorMessage('Bitte gib deine Nachricht an mich ein.'));

            return $this->createErrorResultWithoutCustomerInput($errorMessages);
        }
        if (!$this->isValidMultilineText()) {
            $errorMessages->addErrorMessage(
                new ErrorMessage(
                    sprintf(
                        'Deine Nachricht enthält unerlaubte Sonderzeichen. Erlaubt sind:%s%s',
                        "\n",
                        implode(' ', self::REGEX_PATTERN_PUNCTUATION)
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
