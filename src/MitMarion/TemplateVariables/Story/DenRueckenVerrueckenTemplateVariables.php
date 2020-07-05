<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\Story;

use Shared\TemplateVariables\TemplateVariables;

class DenRueckenVerrueckenTemplateVariables implements TemplateVariables
{
    public function asAssocArray(): array
    {
        return ['foo' => 'bar'];
    }
}
