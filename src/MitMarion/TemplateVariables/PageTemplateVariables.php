<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables;

use Shared\TemplateVariables\TemplateVariables;

abstract class PageTemplateVariables implements TemplateVariables
{
    protected const TEMPLATE_KEY_HTML_HEAD = 'htmlHead';
    protected const TEMPLATE_KEY_TITLE = 'title';

    protected function buildTitle(string $title): string
    {
        return $title . ' - mit Marion';
    }
}
