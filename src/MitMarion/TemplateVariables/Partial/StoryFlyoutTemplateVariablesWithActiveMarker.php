<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\Partial;

use MitMarion\TemplateVariables\ValueObject\CurrentPath;
use RuntimeException;

class StoryFlyoutTemplateVariablesWithActiveMarker extends StoryFlyoutTemplateVariables
{
    private const ARRAY_FILTER_USE_VALUE = 0;

    /**
     * @var array
     */
    private $zeroBasedIndexByPathCache;

    /**
     * @var CurrentPath
     */
    private $currentPath;

    public function __construct(CurrentPath $currentPath)
    {
        $this->currentPath = $currentPath;
    }

    public function asAssocArray(): array
    {
        $currentCaption = $this->getCurrentCaption();

        return [
            'storyNav' => [
                'currentTitle' => $currentCaption,
                'stories' => $this->getOtherStoriesByPath($this->currentPath),
            ],
        ];
    }

    public function getPrevious(): array
    {
        $index = $this->getZeroBasedIndexByPath($this->currentPath);
        $previousItemIndex = $index === 0 ? count(self::STORY_MAP) - 1 : $index - 1;

        return self::STORY_MAP[$previousItemIndex];
    }

    public function getNext(): array
    {
        $index = $this->getZeroBasedIndexByPath($this->currentPath);
        $nextItemIndex = $index === (count(self::STORY_MAP) - 1) ? 0 : ($index + 1);

        return self::STORY_MAP[$nextItemIndex];
    }

    public function getCurrentTitle(): string
    {
        return $this->getCurrentCaption();
    }

    protected function getCurrentCaption(): string
    {
        $index = $this->getZeroBasedIndexByPath($this->currentPath);

        return $this->getCaptionByZeroBasedIndex($index);
    }

    private function getZeroBasedIndexByPath(CurrentPath $currentPath): int
    {
        $currentPathValue = $currentPath->getValue();
        if (isset($this->zeroBasedIndexByPathCache[$currentPathValue])) {
            return $this->zeroBasedIndexByPathCache[$currentPathValue];
        }

        foreach (self::STORY_MAP as $zeroBasedIndex => $story) {
            if ($currentPath->isEqualToValue(trim($story[self::HREF], '/'))) {
                $this->zeroBasedIndexByPathCache[$currentPathValue] = $zeroBasedIndex;

                return $this->zeroBasedIndexByPathCache[$currentPathValue];
            }
        }

        throw new RuntimeException(
            sprintf('Given path was not found in map. [%s]', $currentPath)
        );
    }

    private function getOtherStoriesByPath(CurrentPath $currentPath): array
    {
        $hrefToSearchFor = $currentPath->asUrlPath();
        $filteredStoryMap = array_filter(
            self::STORY_MAP,
            static function (array $story) use ($hrefToSearchFor) {
                return $story[self::HREF] !== $hrefToSearchFor;
            },
            self::ARRAY_FILTER_USE_VALUE
        );
        $this->ensurePathWasFoundInMap($filteredStoryMap, $currentPath);
        $this->ensureAtLeastOneItem($filteredStoryMap, $currentPath);

        return $filteredStoryMap;
    }

    private function ensurePathWasFoundInMap(array $filteredStoryMap, CurrentPath $currentPath): void
    {
        if ($filteredStoryMap === self::STORY_MAP) {
            throw new RuntimeException(
                sprintf('Given path was not found in map. [%s]', $currentPath->getValue())
            );
        }
    }

    private function ensureAtLeastOneItem(array $filteredStoryMap, CurrentPath $currentPath): void
    {
        if (count($filteredStoryMap) === 0) {
            throw new RuntimeException(
                sprintf('Expected at least one item. [%s]', $currentPath->getValue())
            );
        }
    }

    private function getCaptionByZeroBasedIndex(int $index): string
    {
        return self::STORY_MAP[$index][self::CAPTION];
    }
}
