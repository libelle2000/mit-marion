<?php
declare(strict_types=1);

namespace MitMarion\Renderer\Story;

use Shared\Renderer\Renderer;

class DenRueckenVerrueckenRenderer extends Renderer
{
    private const TEMPLATE_ID = 'Story/denRueckenVerruecken.twig';

    protected function getTemplateId(): string
    {
        return self::TEMPLATE_ID;
    }
}
