<?php
declare(strict_types=1);

namespace MitMarion\Renderer;

use Shared\Renderer\Renderer;

class StoryRenderer extends Renderer
{
    private const TEMPLATE_ID = 'Story/story.twig';

    protected function getTemplateId(): string
    {
        return self::TEMPLATE_ID;
    }
}
