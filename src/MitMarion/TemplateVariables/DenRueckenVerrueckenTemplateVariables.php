<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables;

final class DenRueckenVerrueckenTemplateVariables extends StoryPageTemplateVariables
{
    public function asAssocArray(): array
    {
        return array_merge(
            $this->buildBaseTemplateVariables(),
            $this->buildZapperTemplateVariables(),
            [
                'member' => [
                    'mainQuote' => [
                        'backgroundImage' => [
                            'url' => '/_assets/images/dummy.jpg',
                            'position' => 'right, bottom',
                        ],
                        'text' => 'dass ich da nicht eher drauf gekommen bin!',
                    ],
                    'subQuote' => [
                        'text' => 'Ich habe einige Rückenkurse hinter mir, aber das Training mit dem eigenen Körpergewicht bringt mir wirklich was!',
                    ],
                ],
                'marion' => [
                    'quoteText' => 'Ja, Sport ohne Hilfsmittel ist ein Allrounder, das freut den Rücken, denn...',
                    'advantages' => [
                        'wir kräftigen ',
                        'wir mobilisieren',
                        'wir stabilisieren',
                        'wir dehnen',
                    ],
                    'closingText' => 'Neugierig geworden?',
                ],
                'callToAction' => [
                    'caption' => [
                        'Mach mit! Komm dazu!',
                    ],
                ],
            ]
        );
    }
}
