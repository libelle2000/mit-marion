<?php
declare(strict_types=1);
namespace Shared\Renderer;

use Shared\TemplateVariables\TemplateVariables;
use Twig\Environment;

abstract class Renderer
{
    /**
     * @var Environment
     */
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function render(TemplateVariables $vars): string
    {
        return $this->twig->render(
            $this->getTemplateId(), $vars->asAssocArray()
        );
    }

    abstract protected function getTemplateId(): string;
}
