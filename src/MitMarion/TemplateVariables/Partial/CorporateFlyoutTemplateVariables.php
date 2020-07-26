<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\Partial;

use MitMarion\TemplateVariables\TemplateVariables;

class CorporateFlyoutTemplateVariables implements TemplateVariables
{
    protected const CORPORATE_FLYOUT_MAP = [
        [
            self::HREF => '/kontakt/',
            self::CAPTION => 'Kontakt',
            self::IS_CURRENT => false,
        ],
        [
            self::HREF => '/impressum/#datenschutzerklaerung',
            self::CAPTION => 'Datenschutzerklärung',
            self::IS_CURRENT => false,
        ],
        [
            self::HREF => '/impressum/',
            self::CAPTION => 'Impressum',
            self::IS_CURRENT => false,
        ],
    ];

    public function asAssocArray(): array
    {
        return [
            'corporateFlyout' => self::CORPORATE_FLYOUT_MAP,
        ];
    }
}
