<?php
declare(strict_types=1);

namespace MitMarion\Renderer;

use Shared\Renderer\Renderer;

class ErrorNotFoundRenderer extends Renderer
{
    private const TEMPLATE_ID = '404.twig';

    protected function getTemplateId(): string
    {
        return self::TEMPLATE_ID;
    }
}
