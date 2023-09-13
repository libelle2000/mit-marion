<?php
declare(strict_types=1);
namespace MitMarion\Page;

use Shared\Page\Page;
use Shared\Renderer\Renderer;

abstract class StaticTemplatePage implements Page
{
    public function __construct(private readonly Renderer $renderer)
    {
    }

    public function asString(): string
    {
        return $this->renderer->render();
    }
}
