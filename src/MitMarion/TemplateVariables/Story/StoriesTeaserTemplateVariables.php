<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\Story;

use MitMarion\TemplateVariables\TemplateVariables;

final class StoriesTeaserTemplateVariables implements TemplateVariables
{
    /**
     * @var array<StoryTemplateVariables>
     */
    private $storyTemplateVariables;

    public function __construct(StoryTemplateVariables ...$storyTemplateVariables)
    {
        $this->storyTemplateVariables = $storyTemplateVariables;
    }

    public function asAssocArray(): array
    {
        $stories = [];

        foreach ($this->storyTemplateVariables as $storyTemplateVariable) {
            $stories[] = [
                'member' => $storyTemplateVariable->getMemberAsAssocArray(),
                'link' => $storyTemplateVariable->getLinkHrefAsAssocArray(),
            ];
        }

        return [
            'storiesTeaser' => $stories,
        ];
    }
}
