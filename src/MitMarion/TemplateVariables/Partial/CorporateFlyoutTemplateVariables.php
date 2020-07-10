<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\Partial;

use Shared\TemplateVariables\TemplateVariables;

class CorporateFlyoutTemplateVariables implements TemplateVariables
{
    private const ZERO_BASED_INDEX_KONTACT = 0;

    protected const CORPORATE_FLYOUT_MAP = [
        self::ZERO_BASED_INDEX_KONTACT => [
            self::HREF => '/kontakt/',
            self::CAPTION => 'Kontakt',
            self::IS_ACTIVE => false,
        ],
    ];

    public function asAssocArray(): array
    {
        return [
            'corporateFlyout' => self::CORPORATE_FLYOUT_MAP,
        ];
    }
}
