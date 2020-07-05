<?php
declare(strict_types=1);

namespace MitMarion;

use MitMarion\Page\HomePage;
use MitMarion\Page\Story\DenRueckenVerrueckenPage;
use MitMarion\Renderer\HomeRenderer;
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

    public function createHomePage(): HomePage
    {
        return new HomePage(
            $this->createHomeRenderer(),
        );
    }

    private function createHomeRenderer(): HomeRenderer
    {
        return new HomeRenderer(
            $this->createTwigEnvironmentForNamespace()
        );
    }

    private function createDenRueckenVerrueckenRenderer(): DenRueckenVerrueckenRenderer
    {
        return new DenRueckenVerrueckenRenderer(
            $this->createTwigEnvironmentForNamespace()
        );
    }

    private function createTwigEnvironmentForNamespace(): Environment
    {
        return $this->sharedFactory->createTwigEnvironment(
            __DIR__ . '/../../template',
            __DIR__ . '/../../templateCache'
        );
    }
}
