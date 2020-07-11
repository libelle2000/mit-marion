<?php
declare(strict_types=1);

namespace Shared\TemplateVariables\Form;

use Shared\TemplateVariables\Form\Element\CustomerInput;
use Shared\TemplateVariables\Form\Element\Label;
use Shared\TemplateVariables\Form\Element\Placeholder;
use Shared\TemplateVariables\Form\Element\ValidationRegexPattern;

abstract class ElementWithCustomerData extends Element
{
    /**
     * @var CustomerInput
     */
    private $customerInput;

    public function __construct(
        Label $label,
        Placeholder $placeholder,
        ValidationRegexPattern $validationRegexPattern,
        CustomerInput $customerInput
    ) {
        parent::__construct($label, $placeholder, $validationRegexPattern);
        $this->customerInput = $customerInput;
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
