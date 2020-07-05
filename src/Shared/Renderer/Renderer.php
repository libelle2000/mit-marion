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

    public function renderWithTemplateVariables(TemplateVariables $vars): string
    {
        return $this->twig->render($this->getTemplateId(), $vars->asAssocArray());
    }

    public function render(): string
    {
        return $this->twig->render($this->getTemplateId());
    }

    abstract protected function getTemplateId(): string;
}
