<?php
declare(strict_types=1);

namespace Shared\Validator\Element;

use Shared\Http\ParameterValue;
use Shared\ValueObject\Base\Identifier;
use Shared\Http\ParameterizedRequest;
use Shared\TemplateVariables\Form\Element\CustomerInput;
use Shared\TemplateVariables\Form\Element\ErrorMessages;

abstract class ElementValidator
{
    private const REGEX_DELIMITER = '/';
    private const REGEX_PATTERN_LINEFEED = '\n\r';
    private const REGEX_MODIFIER_UNICODE = 'u';
    private const REGEX_MODIFIER_CASE_INSENSITIVE = 'i';
    private const REGEX_PATTERN_CHARACTER = '\w ';
    protected const REGEX_PATTERN_PUNCTUATION = [
        '?',
        '-',
        '_',
        '.',
        ':',
        ',',
        '!',
    ];
    protected const REGEX_PATTERN_NAME = [
        '-',
    ];

    public function __construct(protected ParameterizedRequest $request)
    {
    }

    abstract public function validate(): ElementResult;

    abstract protected function getParameterIdentifier(): Identifier;

    protected function hasValue(): bool
    {
        return $this->request->hasParameterWithValue($this->getParameterIdentifier());
    }

    protected function isValidMultilineText(): bool
    {
        $value = $this->getParameterValue()->getValue();
        $pattern = sprintf(
            '%s[^%s%s%s]%s%s%s',
            self::REGEX_DELIMITER,
            self::REGEX_PATTERN_LINEFEED,
            self::REGEX_PATTERN_CHARACTER,
            preg_quote(implode('', self::REGEX_PATTERN_PUNCTUATION), self::REGEX_DELIMITER),
            self::REGEX_DELIMITER,
            self::REGEX_MODIFIER_UNICODE,
            self::REGEX_MODIFIER_CASE_INSENSITIVE
        );

        return preg_match($pattern, $value) === 0;
    }

    protected function isValidEmail(): bool
    {
        return filter_var($this->getParameterValue()->getValue(), FILTER_VALIDATE_EMAIL) !== false;
    }

    protected function isValidName(): bool
    {
        $pattern = sprintf(
            '%s[^%s%s]%s%s%s',
            self::REGEX_DELIMITER,
            self::REGEX_PATTERN_CHARACTER,
            preg_quote(implode('', self::REGEX_PATTERN_NAME), self::REGEX_DELIMITER),
            self::REGEX_DELIMITER,
            self::REGEX_MODIFIER_UNICODE,
            self::REGEX_MODIFIER_CASE_INSENSITIVE
        );

        return preg_match($pattern, $this->getParameterValue()->getValue()) === 0;
    }

    protected function createEmptyErrorMessages(): ErrorMessages
    {
        return new ErrorMessages();
    }

    protected function createErrorResultWithCustomerInput(ErrorMessages $errorMessages): ErrorElementResult {
        return new ErrorElementResult($this->createCustomerInput(), $errorMessages);
    }

    protected function createErrorResultWithoutCustomerInput(ErrorMessages $errorMessages): ErrorElementResult {
        return new ErrorElementResult(CustomerInput::createEmpty(), $errorMessages);
    }

    protected function createSuccessResult(): SuccessElementResult
    {
        return new SuccessElementResult($this->createCustomerInput());
    }

    protected function getParameterValue(): ParameterValue
    {
        return $this->request->getParameter($this->getParameterIdentifier());
    }

    private function createCustomerInput(): CustomerInput
    {
        return new CustomerInput($this->getParameterValue()->getValue());
    }
}
