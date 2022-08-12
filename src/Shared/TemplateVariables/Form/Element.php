<?php
declare(strict_types=1);

namespace Shared\TemplateVariables\Form;

use Shared\TemplateVariables\Form\Element\Label;
use Shared\TemplateVariables\Form\Element\Placeholder;
use Shared\TemplateVariables\TemplateVariables;

abstract class Element implements TemplateVariables
{
    private Label $label;

    private Placeholder $placeholder;

    public function __construct(Label $label, Placeholder $placeholder)
    {
        $this->label = $label;
        $this->placeholder = $placeholder;
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
            ),
        ];
    }

    abstract protected function getTemplateIdentifier(): string;
}
