<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables;

use RuntimeException;
use Shared\TemplateVariables\TemplateVariables;

abstract class StoryTemplateVariables implements TemplateVariables
{
    protected const ZERO_BASED_INDEX_VOM_REGEN_ERFRISCHEN_LASSEN = 0;
    protected const ZERO_BASED_INDEX_DEN_RUECKEN_VERRUECKEN = 1;
    protected const ZERO_BASED_INDEX_DIE_FAZIEN_FETZEN = 2;
    protected const HREF = 'href';
    protected const CAPTION = 'caption';

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
    ];

    private const ARRAY_FILTER_USE_VALUE = 0;

    /**
     * @var array
     */
    private $zeroBasedIndexByTitleCache;

    protected function getOtherStoriesByCurrentTitle(string $currentTitle): array
    {
        $filteredStoryMap = array_filter(
            self::STORY_MAP,
            static function (array $story) use ($currentTitle) {
                return $story['caption'] !== $currentTitle;
            },
            self::ARRAY_FILTER_USE_VALUE
        );
        $this->ensureTitleWasFoundInMap($filteredStoryMap, $currentTitle);
        $this->ensureAtLeastOneItem($filteredStoryMap, $currentTitle);

        return $filteredStoryMap;
    }

    protected function getPreviousByCurrentTitle(string $currentTitle): array
    {
        $indexOfMatch = $this->getZeroBasedIndexByTitle($currentTitle);
        $previousItemIndex = $indexOfMatch === 0 ? count(self::STORY_MAP) -1 : $indexOfMatch -1;

        return self::STORY_MAP[$previousItemIndex];
    }

    protected function getNextByCurrentTitle(string $currentTitle): array
    {
        $indexOfMatch = $this->getZeroBasedIndexByTitle($currentTitle);
        $nextItemIndex = $indexOfMatch === (count(self::STORY_MAP) - 1) ? 0 : ($indexOfMatch + 1);

        return self::STORY_MAP[$nextItemIndex];
    }

    private function getZeroBasedIndexByTitle(string $currentTitle): int
    {
        if (isset($this->zeroBasedIndexByTitleCache[$currentTitle])) {
            return $this->zeroBasedIndexByTitleCache[$currentTitle];
        }

        foreach (self::STORY_MAP as $zeroBasedIndex => $story) {
            if ($story[self::CAPTION] === $currentTitle) {
                $this->zeroBasedIndexByTitleCache[$currentTitle] = $zeroBasedIndex;
                return $this->zeroBasedIndexByTitleCache[$currentTitle];
            }
        }

        throw new RuntimeException(
            sprintf('Given Title was not found in map. [%s]', $currentTitle)
        );
    }

    private function ensureTitleWasFoundInMap(array $filteredStoryMap, string $currentTitle): void
    {
        if ($filteredStoryMap === self::STORY_MAP) {
            throw new RuntimeException(
                sprintf('Given Title was not found in map. [%s]', $currentTitle)
            );
        }
    }

    private function ensureAtLeastOneItem(array $filteredStoryMap, string $currentTitle): void
    {
        if (count($filteredStoryMap) === 0) {
            throw new RuntimeException(
                sprintf('Expected at least one item. [%s]', $currentTitle)
            );
        }
    }
}
