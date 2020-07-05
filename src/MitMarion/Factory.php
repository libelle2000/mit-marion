<?php
declare(strict_types=1);

namespace MitMarion;

use MitMarion\Page\Story\DenRueckenVerrueckenPage;
use MitMarion\Renderer\Story\DenRueckenVerrueckenRenderer;
use MitMarion\TemplateVariables\Story\DenRueckenVerrueckenTemplateVariables;
use Shared\Factory as SharedFactory;
use Twig\Environment;

class Factory
{
    /**
     * @var \Shared\Factory
     */
    private $sharedFactory;

    public function __construct(SharedFactory $sharedFactory)
    {
        $this->sharedFactory = $sharedFactory;
    }

    public function createDenRueckenVerrueckenPage(
        DenRueckenVerrueckenTemplateVariables $denRueckenVerrueckenTemplateVariables
    ): DenRueckenVerrueckenPage {
        return new DenRueckenVerrueckenPage(
            $this->createDenRueckenVerrueckenRenderer(),
            $denRueckenVerrueckenTemplateVariables
        );
    }

    private function createDenRueckenVerrueckenRenderer(): DenRueckenVerrueckenRenderer
    {
        return new DenRueckenVerrueckenRenderer(
            $this->createTwigEnvironmentForNamespace()
        );
    }

    /**
     * @return Environment
     */
    private function createTwigEnvironmentForNamespace(): Environment
    {
        return $this->sharedFactory->createTwigEnvironment(
            __DIR__ . '/../../template',
            __DIR__ . '/../../templateCache'
        );
    }
}
