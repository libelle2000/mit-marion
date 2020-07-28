<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\Story;

final class DenRueckenVerrueckenTemplateVariables implements StoryTemplateVariables
{
    public function asAssocArray(): array
    {
        return [
            'member' => [
                'mainQuote' => $this->getMainQuoteAsAssocArray(),
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
        ];
    }

    public function getMainQuoteAsAssocArray(): array
    {
        return [
            'backgroundImage' => [
                'url' => '/_assets/images/dummy.jpg',
                'position' => 'right, bottom',
            ],
            'text' => 'dass ich da nicht eher drauf gekommen bin!',
        ];
    }
}
