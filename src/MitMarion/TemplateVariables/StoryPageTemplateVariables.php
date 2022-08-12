<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables;

use MitMarion\TemplateVariables\Partial\CorporateFlyoutTemplateVariables;
use MitMarion\TemplateVariables\Partial\StoryFlyoutTemplateVariablesWithActiveMarker;
use MitMarion\TemplateVariables\Story\StoryTemplateVariables;

final class StoryPageTemplateVariables extends PageTemplateVariables
{
    private StoryFlyoutTemplateVariablesWithActiveMarker $storyFlyout;

    private StoryTemplateVariables $story;

    public function __construct(
        CorporateFlyoutTemplateVariables $corporateFlyout,
        StoryFlyoutTemplateVariablesWithActiveMarker $storyFlyout,
        StoryTemplateVariables $story
    ) {
        parent::__construct($corporateFlyout, $storyFlyout);
        $this->storyFlyout = $storyFlyout;
        $this->story = $story;
    }

    public function asAssocArray(): array
    {
        return array_merge(
            $this->buildBaseTemplateVariables(),
            $this->buildZapperTemplateVariables(),
            $this->story->asAssocArray()
        );
    }

    protected function getTitleValue(): string
    {
        return $this->storyFlyout->getCurrentTitle();
    }

    protected function getMetaDescription(): string
    {
        return $this->story->getMetaDescriptionValue();
    }

    private function buildZapperTemplateVariables(): array
    {
        return [
            'zapper' => [
                'previous' => $this->storyFlyout->getPrevious(),
                'next' => $this->storyFlyout->getNext(),
            ],
        ];
    }
}
