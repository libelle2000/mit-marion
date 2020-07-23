<?php
declare(strict_types=1);

namespace Shared\TemplateVariables\Form\Element;

use Shared\BaseValueObject\Optional\OptionalString;

class OptionalPlaceholder extends Placeholder implements OptionalString
{
    public function __construct()
    {
        parent::__construct(self::EMPTY_STRING);
    }
}
