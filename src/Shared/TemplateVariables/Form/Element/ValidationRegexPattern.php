<?php
declare(strict_types=1);

namespace Shared\TemplateVariables\Form\Element;

use Shared\BaseValueObject\BaseString;
use Shared\TemplateVariables\TemplateVariables;

class ValidationRegexPattern extends BaseString implements TemplateVariables
{
    public function asAssocArray(): array
    {
        return [
            'validationRegexPattern' => $this->getValue(),
        ];
    }
}
