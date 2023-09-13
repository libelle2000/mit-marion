<?php
declare(strict_types=1);

namespace MitMarion\Validator;

use Shared\TemplateVariables\Form\Element\CustomerInput;

class ValidatedContactFormData
{
    public function __construct(private readonly CustomerInput $customerInputPreName, private readonly CustomerInput $customerInputSurName, private readonly CustomerInput $customerInputEMail, private readonly CustomerInput $customerInputCustomerMessage, private readonly CustomerInput $customerInputDataPrivacy)
    {
    }

    public function getCustomerInputPreName(): CustomerInput
    {
        return $this->customerInputPreName;
    }

    public function getCustomerInputSurName(): CustomerInput
    {
        return $this->customerInputSurName;
    }

    public function getCustomerInputEMail(): CustomerInput
    {
        return $this->customerInputEMail;
    }

    public function getCustomerInputCustomerMessage(): CustomerInput
    {
        return $this->customerInputCustomerMessage;
    }

    public function getCustomerInputDataPrivacy(): CustomerInput
    {
        return $this->customerInputDataPrivacy;
    }
}
