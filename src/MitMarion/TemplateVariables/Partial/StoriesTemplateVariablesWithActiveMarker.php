<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\Partial;

use MitMarion\TemplateVariables\ValueObject\CurrentTitle;
use RuntimeException;

class StoriesTemplateVariablesWithActiveMarker extends StoriesTemplateVariables
{
    private const ARRAY_FILTER_USE_VALUE = 0;

    /**
     * @var array
     */
    private $zeroBasedIndexByTitleCache;

    /**
     * @var CurrentTitle
     */
    private $currentTitle;

    public function __construct(CurrentTitle $currentTitle)
    {
        $this->currentTitle = $currentTitle;
    }

    public function asAssocArray(): array
    {
        $currentTitle = $this->currentTitle->getValue();

        return [
            'storyNav' => [
                'currentTitle' => $currentTitle,
                'stories' => $this->getOtherStoriesByCurrentTitle($currentTitle),
            ],
        ];
    }

    public function getPreviousByCurrentTitle(string $currentTitle): array
    {
        $indexOfMatch = $this->getZeroBasedIndexByTitle($currentTitle);
        $previousItemIndex = $indexOfMatch === 0 ? count(self::STORY_MAP) -1 : $indexOfMatch -1;

        return self::STORY_MAP[$previousItemIndex];
    }

    public function getNextByCurrentTitle(string $currentTitle): array
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

    private function getOtherStoriesByCurrentTitle(string $currentTitle): array
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
