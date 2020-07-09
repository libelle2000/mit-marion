<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables;

final class VomRegenErfrischenLassenTemplateVariables extends StoryTemplateVariables
{
    public function asAssocArray(): array
    {
        $currentTitle = self::STORY_MAP[self::ZERO_BASED_INDEX_DEN_RUECKEN_VERRUECKEN][self::CAPTION];

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
                        'url' => '/_assets/images/dummy.jpg',
                        'position' => 'right, bottom',
                    ],
                    'text' => 'das Sofa lockt, aber ich gehe doch los und bin ganz stolz auf mich!',
                ],
                'subQuote' => [
                    'text' => 'Ich beneide all diejenigen, die bei Wind und Wetter unterwegs sind! Wie geht das?',
                ],
            ],
            'marion' => [
                'quoteText' => 'Gemeinsam! Und ich zeige dir wie! Spaß ist garantiert... :-)',
                'advantages' => [
                ],
                'closingText' => 'Wir verpassen dem Regen gute Laune ;-)',
            ],
            'callToAction' => [
                'caption' => 'Komm dazu!',
            ],
            'zapper' => [
                'previous' => $this->getPreviousByCurrentTitle($currentTitle),
                'next' => $this->getNextByCurrentTitle($currentTitle),
            ],
        ];
    }
}
