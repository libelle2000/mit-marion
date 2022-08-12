<?php
declare(strict_types=1);
namespace Shared\Validator\Element;

use Shared\TemplateVariables\Form\Element\CustomerInput;
use Shared\TemplateVariables\Form\Element\ErrorMessages;

class ErrorElementResult extends ElementResult
{
    private ErrorMessages $errorMessages;

    public function __construct(CustomerInput $customerInput, ErrorMessages $errorMessages)
    {
        parent::__construct($customerInput);
        $this->errorMessages = $errorMessages;
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
