<?php
declare(strict_types=1);

namespace Shared\TemplateVariables\Form;

use Shared\TemplateVariables\Form\Element\CustomerInput;
use Shared\TemplateVariables\Form\Element\Label;
use Shared\TemplateVariables\Form\Element\Placeholder;

abstract class ElementWithCustomerData extends Element
{
    public function __construct(
        Label $label,
        Placeholder $placeholder,
        private readonly CustomerInput $customerInput
    ) {
        parent::__construct($label, $placeholder);
    }

    public function asAssocArray(): array
    {
        return array_merge_recursive(
            parent::asAssocArray(),
            [
                $this->getTemplateIdentifier() => $this->customerInput->asAssocArray(),
            ],
        );
    }
}
