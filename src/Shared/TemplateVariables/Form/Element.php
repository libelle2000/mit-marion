<?php
declare(strict_types=1);

namespace Shared\TemplateVariables\Form;

use Shared\TemplateVariables\Form\Element\Label;
use Shared\TemplateVariables\Form\Element\Placeholder;
use Shared\TemplateVariables\TemplateVariables;

abstract class Element implements TemplateVariables
{
    public function __construct(private readonly Label $label, private readonly Placeholder $placeholder)
    {
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
