<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\Story;

final class DieFazienFetzenTemplateVariables implements StoryTemplateVariables
{
    public function asAssocArray(): array
    {
        return [
            'member' => [
                'mainQuote' => $this->getMainQuoteAsAssocArray(),
                'subQuote' => [
                    'text' => 'Ich spiele schon soo lange Volleyball, aber erst jetzt merke ich, was mir fehlt!',
                ],
            ],
            'marion' => [
                'quoteText' => 'Sowas höre ich öfter! Da ist jemand schon sehr sportlich und plötzlich ist da der Ah-Ha Effekt.',
                'advantages' => [
                    'die Beine erholen sich viel schneller,',
                    'der Bewegungsumfang der Arme ist plötzlich viel größer',
                    'der Muskelkater bleibt aus',
                ],
                'closingText' => 'Die Faszienübungen sind echte Allrounder!',
            ],
            'callToAction' => [
                'caption' => [
                    'Jetzt zur Probe mitmachen',
                ],
            ],
        ];
    }

    public function getMainQuoteAsAssocArray(): array
    {
        return [
            'backgroundImage' => [
                'url' => '/_assets/images/faszien-rolle.jpg',
                'position' => 'right, bottom',
            ],
            'text' => 'das müsste ich eigentlich viel häufiger machen!',
        ];
    }
}
