<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables;

use Shared\TemplateVariables\TemplateVariables as SharedTemplateVariables;

interface TemplateVariables extends SharedTemplateVariables
{
    public const HREF = 'href';
    public const CAPTION = 'caption';
    public const IS_CURRENT = 'isCurrent';
}
