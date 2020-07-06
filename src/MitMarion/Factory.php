<?php
declare(strict_types=1);

namespace MitMarion;

use MitMarion\Page\HomePage;
use MitMarion\Page\Story\StoryPage;
use MitMarion\Renderer\HomeRenderer;
use MitMarion\Renderer\Story\StoryRenderer;
use MitMarion\TemplateVariables\Story\StoryTemplateVariables;
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

    public function createStoryPage(
        StoryTemplateVariables $storyTemplateVariables
    ): StoryPage {
        return new StoryPage(
            $this->createStoryRenderer(),
            $storyTemplateVariables
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

    private function createStoryRenderer(): StoryRenderer
    {
        return new StoryRenderer(
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
