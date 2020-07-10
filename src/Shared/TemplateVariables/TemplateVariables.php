<?php
declare(strict_types=1);

namespace Shared\TemplateVariables;

interface TemplateVariables
{
    public const HREF = 'href';
    public const CAPTION = 'caption';
    public const IS_ACTIVE = 'isActive';

    public function asAssocArray(): array;
}
