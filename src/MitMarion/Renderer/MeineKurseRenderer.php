<?php
declare(strict_types=1);

namespace MitMarion\Renderer;

use Shared\Renderer\Renderer;

class MeineKurseRenderer extends Renderer
{
    private const TEMPLATE_ID = 'meineKurse.twig';

    protected function getTemplateId(): string
    {
        return self::TEMPLATE_ID;
    }
}
