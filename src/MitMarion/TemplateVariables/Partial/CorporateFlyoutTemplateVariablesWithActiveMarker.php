<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\Partial;

use MitMarion\TemplateVariables\ValueObject\CurrentPath;
use RuntimeException;

class CorporateFlyoutTemplateVariablesWithActiveMarker extends CorporateFlyoutTemplateVariables
{
    private CurrentPath $currentPath;

    public function __construct(CurrentPath $currentPath)
    {
        $this->currentPath = $currentPath;
    }

    public function asAssocArray(): array
    {
        return [
            'corporateFlyout' => $this->markCurrentItemAsActive(
                self::CORPORATE_FLYOUT_MAP,
                $this->currentPath
            ),
        ];
    }


    private function markCurrentItemAsActive(array $map, CurrentPath $currentPath): array
    {
        foreach ($map as $index => $item) {
            if ($currentPath->isEqualToValue(trim($item[self::HREF], DIRECTORY_SEPARATOR))) {
                $map[$index][self::IS_CURRENT] = true;
                return $map;
            }
        }

        throw new RuntimeException(
            sprintf('Given path was not found [%s]', $currentPath->getValue())
        );
    }
}
