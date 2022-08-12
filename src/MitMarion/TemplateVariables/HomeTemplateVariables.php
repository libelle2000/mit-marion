<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables;

use MitMarion\TemplateVariables\Partial\CorporateFlyoutTemplateVariables;
use MitMarion\TemplateVariables\Partial\StoryFlyoutTemplateVariables;
use MitMarion\TemplateVariables\Story\StoriesTeaserTemplateVariables;

final class HomeTemplateVariables extends PageTemplateVariables
{
    private StoriesTeaserTemplateVariables $storiesTeaser;

    public function __construct(
        CorporateFlyoutTemplateVariables $corporateFlyout,
        StoryFlyoutTemplateVariables $storyFlyout,
        StoriesTeaserTemplateVariables $storiesTeaser
    ) {
        parent::__construct($corporateFlyout, $storyFlyout);
        $this->storiesTeaser = $storiesTeaser;
    }

    public function asAssocArray(): array
    {
        return array_merge(
            $this->buildBaseTemplateVariables(),
            $this->storiesTeaser->asAssocArray()
        );
    }

    protected function getTitleValue(): string
    {
        return 'Outdoor Sport';
    }

    protected function getMetaDescription(): string
    {
        return 'Mit Outdoor Sport zum persönlichen Erfolg.';
    }
}
