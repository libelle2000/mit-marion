<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\Partial;

use MitMarion\TemplateVariables\TemplateVariables;

class StoryFlyoutTemplateVariables implements TemplateVariables
{
    protected const STORY_MAP = [
        self::ZERO_BASED_INDEX_VOM_REGEN_ERFRISCHEN_LASSEN => [
            self::HREF => '/vom-regen-erfrischen-lassen/',
            self::CAPTION => 'vom Regen erfrischen lassen',
        ],
        self::ZERO_BASED_INDEX_DEN_RUECKEN_VERRUECKEN => [
            self::HREF => '/den-rücken-verrücken/',
            self::CAPTION => 'den Rücken verrücken',
        ],
        self::ZERO_BASED_INDEX_DIE_FAZIEN_FETZEN => [
            self::HREF => '/die-fazien-fetzen/',
            self::CAPTION => 'die Faszien fetzen',
        ],
        self::ZERO_BASED_INDEX_DEN_ALLTAG_FUER_EINE_STUNDE_VERGESSEN => [
            self::HREF => '/den-alltag-für-eine-stunde-vergessen/',
            self::CAPTION => 'den Alltag für eine Stunde vergessen',
        ],
    ];

    private const ZERO_BASED_INDEX_VOM_REGEN_ERFRISCHEN_LASSEN = 0;
    private const ZERO_BASED_INDEX_DEN_RUECKEN_VERRUECKEN = 1;
    private const ZERO_BASED_INDEX_DIE_FAZIEN_FETZEN = 2;
    private const ZERO_BASED_INDEX_DEN_ALLTAG_FUER_EINE_STUNDE_VERGESSEN = 3;

    public function asAssocArray(): array
    {
        return [
            'storyNav' => [
                'currentTitle' => 'Entdecke die Erfolgstories',
                'stories' => self::STORY_MAP,
            ],
        ];
    }
}
