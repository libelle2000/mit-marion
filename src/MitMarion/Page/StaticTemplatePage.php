<?php
declare(strict_types=1);
namespace MitMarion\Page;

use Shared\Page\Page;
use Shared\Renderer\Renderer;

abstract class StaticTemplatePage implements Page
{
    private Renderer $renderer;

    public function __construct(Renderer $renderer)
    {
        $this->renderer = $renderer;
    }

    public function asString(): string
    {
        return $this->renderer->render();
    }
}
