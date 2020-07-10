<?php
declare(strict_types=1);

namespace MitMarion\Renderer;

use Shared\Renderer\Renderer;

class ContactFormRenderer extends Renderer
{
    private const TEMPLATE_ID = 'Contact/form.twig';

    protected function getTemplateId(): string
    {
        return self::TEMPLATE_ID;
    }
}
