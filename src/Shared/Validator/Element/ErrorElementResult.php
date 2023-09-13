<?php
declare(strict_types=1);
namespace Shared\Validator\Element;

use Shared\TemplateVariables\Form\Element\CustomerInput;
use Shared\TemplateVariables\Form\Element\ErrorMessages;

class ErrorElementResult extends ElementResult
{
    public function __construct(CustomerInput $customerInput, private readonly ErrorMessages $errorMessages)
    {
        parent::__construct($customerInput);
    }

    public function hasErrors(): bool
    {
        return true;
    }

    public function getErrorMessages(): ErrorMessages
    {
        return $this->errorMessages;
    }
}
