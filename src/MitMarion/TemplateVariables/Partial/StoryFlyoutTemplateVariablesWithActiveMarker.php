<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\Partial;

use MitMarion\TemplateVariables\ValueObject\CurrentPath;
use RuntimeException;
use Shared\ValueObject\Link\Href;

class StoryFlyoutTemplateVariablesWithActiveMarker extends StoryFlyoutTemplateVariables
{
    private const ARRAY_FILTER_USE_VALUE = 0;

    private array $zeroBasedIndexByPathCache;

    public function __construct(private readonly CurrentPath $currentPath)
    {
    }

    public function asAssocArray(): array
    {
        $currentLinkHref = $this->getCurrentLinkHref();

        return [
            'storyNav' => [
                'currentTitle' => trim($currentLinkHref->getValue(), '/'),
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

    public function getCurrentLinkHref(): Href
    {
        $index = $this->getZeroBasedIndexByPath($this->currentPath);

        return $this->buildLinkHrefByZeroBasedIndex($index);
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
            sprintf('Given path was not found in map. [%s]', $currentPathValue)
        );
    }

    private function getOtherStoriesByPath(CurrentPath $currentPath): array
    {
        $hrefToSearchFor = $currentPath->asUrlPath();
        $filteredStoryMap = array_filter(
            self::STORY_MAP,
            static fn(array $story): bool => $story[self::HREF] !== $hrefToSearchFor,
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
        if ($filteredStoryMap === []) {
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
