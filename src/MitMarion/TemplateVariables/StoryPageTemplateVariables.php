<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables;

use MitMarion\TemplateVariables\Partial\CorporateFlyoutTemplateVariables;
use MitMarion\TemplateVariables\Partial\StoriesTemplateVariablesWithActiveMarker;
use MitMarion\TemplateVariables\Story\StoryTemplateVariables;

final class StoryPageTemplateVariables extends PageTemplateVariables
{
    /**
     * @var StoriesTemplateVariablesWithActiveMarker
     */
    private $stories;

    /**
     * @var StoryTemplateVariables
     */
    private $story;

    public function __construct(
        CorporateFlyoutTemplateVariables $corporateFlyout,
        StoriesTemplateVariablesWithActiveMarker $stories,
        StoryTemplateVariables $story
    ) {
        parent::__construct($corporateFlyout, $stories);
        $this->stories = $stories;
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
        return $this->stories->getCurrentTitle();
    }

    private function buildZapperTemplateVariables(): array
    {
        return [
            'zapper' => [
                'previous' => $this->stories->getPrevious(),
                'next' => $this->stories->getNext(),
            ],
        ];
    }
}
