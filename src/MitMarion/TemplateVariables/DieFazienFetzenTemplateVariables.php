<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables;

final class DieFazienFetzenTemplateVariables extends StoryTemplateVariables
{
    public function asAssocArray(): array
    {
        $currentTitle = self::STORY_MAP[self::ZERO_BASED_INDEX_DIE_FAZIEN_FETZEN][self::CAPTION];

        return [
            'htmlHead' => [
                'title' => $currentTitle,
            ],
            'storyNav' => [
                'currentTitle' => $currentTitle,
                'stories' => $this->getOtherStoriesByCurrentTitle($currentTitle),
            ],
            'member' => [
                'mainQuote' => [
                    'backgroundImage' => [
                        'url' => '/_assets/images/faszien-rolle.jpg',
                        'position' => 'right, bottom',
                    ],
                    'text' => 'das müsste ich eigentlich viel häufiger machen!',
                ],
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
                'caption' => 'Jetzt zur Probe mitmachen',
            ],
            'zapper' => [
                'previous' => $this->getPreviousByCurrentTitle($currentTitle),
                'next' => $this->getNextByCurrentTitle($currentTitle),
            ],
        ];
    }
}
