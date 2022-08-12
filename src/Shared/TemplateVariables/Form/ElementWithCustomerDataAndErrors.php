<?php
declare(strict_types=1);

namespace Shared\TemplateVariables\Form;

use Shared\TemplateVariables\Form\Element\CustomerInput;
use Shared\TemplateVariables\Form\Element\ErrorMessages;
use Shared\TemplateVariables\Form\Element\Label;
use Shared\TemplateVariables\Form\Element\Placeholder;

abstract class ElementWithCustomerDataAndErrors extends ElementWithCustomerData
{
    private ErrorMessages $errorMessages;

    public function __construct(
        Label $label,
        Placeholder $placeholder,
        CustomerInput $customerInput,
        ErrorMessages $errorMessages
    ) {
        parent::__construct($label, $placeholder, $customerInput);
        $this->errorMessages = $errorMessages;
    }

    public function hasErrors(): bool
    {
        return true;
    }

    public function asAssocArray(): array
    {
        return array_merge_recursive(
            parent::asAssocArray(),
            [
                $this->getTemplateIdentifier() => $this->errorMessages->asAssocArray(),
            ],
        );
    }
}
