<?php
declare(strict_types=1);

namespace Shared\TemplateVariables\Form;

use Shared\TemplateVariables\Form\Element\Label;
use Shared\TemplateVariables\Form\Element\Placeholder;
use Shared\TemplateVariables\Form\Element\ValidationRegexPattern;
use Shared\TemplateVariables\TemplateVariables;

abstract class Element implements TemplateVariables
{
    /**
     * @var Label
     */
    private $label;

    /**
     * @var Placeholder
     */
    private $placeholder;

    /**
     * @var ValidationRegexPattern
     */
    private $validationRegexPattern;

    public function __construct(Label $label, Placeholder $placeholder, ValidationRegexPattern $validationRegexPattern)
    {
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->validationRegexPattern = $validationRegexPattern;
    }

    public function hasErrors(): bool
    {
        return false;
    }

    public function asAssocArray(): array
    {
        return [
            $this->getTemplateIdentifier() => array_merge(
                [
                    'identifier' => $this->getTemplateIdentifier(),
                ],
                $this->label->asAssocArray(),
                $this->placeholder->asAssocArray(),
                $this->validationRegexPattern->asAssocArray(),
            ),
        ];
    }

    abstract protected function getTemplateIdentifier(): string;
}
