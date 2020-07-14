<?php
declare(strict_types=1);
namespace Shared\Validator\Element;

use Shared\TemplateVariables\Form\Element\CustomerInput;

abstract class ElementResult
{
    /**
     * @var CustomerInput
     */
    private $customerInput;

    public function __construct(CustomerInput $customerInput)
    {
        $this->customerInput = $customerInput;
    }

    public function getCustomerInput(): CustomerInput
    {
        return $this->customerInput;
    }


    abstract public function hasErrors(): bool;
}
