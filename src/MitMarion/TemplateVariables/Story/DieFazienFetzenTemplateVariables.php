<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\Story;

final class DieFazienFetzenTemplateVariables extends StoryTemplateVariables
{
    public function asAssocArray(): array
    {
        return [
            'member' => $this->getMemberAsAssocArray(),
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

    public function getMemberAsAssocArray(): array
    {
        return [
            'mainQuote' => [
                'backgroundImage' => [
                    'url' => '/_assets/images/die-faszien-fetzen/beindehnung-zur-seite.jpg',
                    'position' => 'center, right',
                ],
                'text' => 'das müsste ich eigentlich viel häufiger machen!',
            ],
            'subQuote' => [
                'text' => 'Ich spiele schon soo lange Volleyball, aber erst jetzt merke ich, was mir fehlt!',
            ],
        ];
    }

    public function getMetaDescriptionValue(): string
    {
        return 'An die Faszien zu denken, bringt jeden Sportler ein gutes Stück weiter.';
    }
}
