<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\Story;

use Shared\TemplateVariables\TemplateVariables;

abstract class StoryTemplateVariables implements TemplateVariables
{
    private const ARRAY_FILTER_USE_VALUE = 0;
    private const STORY_MAP = [
        [
            'href' => '/dem-regen-trotzen/',
            'caption' => 'dem Regen trotzen',
        ],
        [
            'href' => '/den-rücken-verrücken/',
            'caption' => 'den Rücken verrücken',
        ],
        [
            'href' => '/die-fazien-fetzen/',
            'caption' => 'die Faszien fetzen',
        ],
    ];

    protected function getOtherStoriesByCurrentTitle(string $currentTitle): array
    {
        return array_filter(
            self::STORY_MAP,
            static function (array $story) use ($currentTitle) {
                return $story['caption'] !== $currentTitle;
            },
            self::ARRAY_FILTER_USE_VALUE
        );
    }
}
