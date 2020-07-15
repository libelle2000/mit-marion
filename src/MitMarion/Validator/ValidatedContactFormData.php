<?php
declare(strict_types=1);

namespace MitMarion\Validator;

use Shared\TemplateVariables\Form\Element\CustomerInput;

class ValidatedContactFormData
{
    /**
     * @var CustomerInput
     */
    private $customerInputPreName;
    /**
     * @var CustomerInput
     */
    private $customerInputSurName;
    /**
     * @var CustomerInput
     */
    private $customerInputEMail;
    /**
     * @var CustomerInput
     */
    private $customerInputCustomerMessage;
    /**
     * @var CustomerInput
     */
    private $customerInputDataPrivacy;

    public function __construct(
        CustomerInput $customerInputPreName,
        CustomerInput $customerInputSurName,
        CustomerInput $customerInputEMail,
        CustomerInput $customerInputCustomerMessage,
        CustomerInput $customerInputDataPrivacy
    ) {
        $this->customerInputPreName = $customerInputPreName;
        $this->customerInputSurName = $customerInputSurName;
        $this->customerInputEMail = $customerInputEMail;
        $this->customerInputCustomerMessage = $customerInputCustomerMessage;
        $this->customerInputDataPrivacy = $customerInputDataPrivacy;
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
