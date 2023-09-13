<?php
declare(strict_types=1);
namespace Shared\Validator\Element;

use Shared\TemplateVariables\Form\Element\CustomerInput;

abstract class ElementResult
{
    public function __construct(private readonly CustomerInput $customerInput)
    {
    }

    public function getCustomerInput(): CustomerInput
    {
        return $this->customerInput;
    }


    abstract public function hasErrors(): bool;
}
