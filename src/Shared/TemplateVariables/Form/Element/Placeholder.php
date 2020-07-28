<?php
declare(strict_types=1);

namespace Shared\TemplateVariables\Form\Element;

use Shared\ValueObject\Base\BaseString;
use Shared\TemplateVariables\TemplateVariables;

class Placeholder extends BaseString implements TemplateVariables
{
    public function asAssocArray(): array
    {
        return [
            'placeholder' => $this->getValue(),
        ];
    }
}
