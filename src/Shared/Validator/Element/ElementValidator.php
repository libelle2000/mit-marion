<?php
declare(strict_types=1);

namespace Shared\Validator\Element;

use Shared\BaseValueObject\Identifier;
use Shared\Http\ParameterizedRequest;
use Shared\TemplateVariables\Form\Element\CustomerInput;
use Shared\TemplateVariables\Form\Element\ErrorMessages;

abstract class ElementValidator
{
    private const REGEX_DELIMITER = '/';
    private const REGEX_PATTERN_LINEFEED = '\n\r';
    private const REGEX_MODIFIER_UNICODE = 'u';
    private const REGEX_MODIFIER_CASE_INSENSITIVE = 'i';
    private const REGEX_PATTERN_CHARACTER = '\w öäüßÖÄÜ';
    protected const REGEX_PATTERN_PUNCTUATION = [
        '?',
        '.',
        ':',
        ',',
        '!',
    ];

    /**
     * @var ParameterizedRequest
     */
    protected $request;

    public function __construct(ParameterizedRequest $request)
    {
        $this->request = $request;
    }

    abstract public function validate(): ElementResult;

    abstract protected function getParameterIdentifier(): Identifier;

    protected function hasValue(): bool
    {
        return $this->request->hasParameterWithValue($this->getParameterIdentifier());
    }

    protected function hasAllowedCharacterIncludingLinefeed(): bool
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

    protected function isEmail(): bool
    {
        return filter_var($this->getParameterValue()->getValue(), FILTER_VALIDATE_EMAIL) !== false;
    }

    protected function hasAllowedCharacterWithoutLinefeed(): bool
    {
        $pattern = sprintf(
            '%s[^%s%s]%s%s%s',
            self::REGEX_DELIMITER,
            self::REGEX_PATTERN_CHARACTER,
            preg_quote(implode('', self::REGEX_PATTERN_PUNCTUATION), self::REGEX_DELIMITER),
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

    protected function getParameterValue(): \Shared\Http\ParameterValue
    {
        return $this->request->getParameter($this->getParameterIdentifier());
    }

    private function createCustomerInput(): CustomerInput
    {
        return new CustomerInput($this->getParameterValue()->getValue());
    }
}
