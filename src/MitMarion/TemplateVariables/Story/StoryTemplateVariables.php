<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\Story;

use Shared\TemplateVariables\TemplateVariables;

abstract class StoryTemplateVariables implements TemplateVariables
{
    private const ARRAY_FILTER_USE_VALUE = 0;

    protected const DEM_REGEN_TROTZEN = 0;
    protected const DEN_RUECKEN_VERRUECKEN = 1;
    protected const DIE_FAZIEN_FETZEN = 2;
    protected const HREF = 'href';
    protected const CAPTION = 'caption';

    protected const STORY_MAP = [
        self::DEM_REGEN_TROTZEN => [
            self::HREF => '/dem-regen-trotzen/',
            self::CAPTION => 'dem Regen trotzen',
        ],
        self::DEN_RUECKEN_VERRUECKEN => [
            self::HREF => '/den-rücken-verrücken/',
            self::CAPTION => 'den Rücken verrücken',
        ],
        self::DIE_FAZIEN_FETZEN => [
            self::HREF => '/die-fazien-fetzen/',
            self::CAPTION => 'die Faszien fetzen',
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
