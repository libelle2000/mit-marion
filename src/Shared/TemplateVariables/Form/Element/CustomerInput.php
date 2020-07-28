<?php
declare(strict_types=1);

namespace Shared\TemplateVariables\Form\Element;

use Shared\ValueObject\Base\BaseString;
use Shared\TemplateVariables\TemplateVariables;

class CustomerInput extends BaseString implements TemplateVariables
{
    public function asAssocArray(): array
    {
        return [
            'customerInput' => $this->getValue(),
        ];
    }

    public static function createEmpty(): self
    {
        return new self('');
    }
}
