<?php
declare(strict_types=1);

namespace MitMarion\Renderer;

use Shared\Renderer\Renderer;

class VielenDankRenderer extends Renderer
{
    private const TEMPLATE_ID = 'Contact/vielenDank.twig';

    protected function getTemplateId(): string
    {
        return self::TEMPLATE_ID;
    }
}
