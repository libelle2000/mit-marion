<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables;

final class DenAlltagFuerEineStundeVergessenTemplateVariables extends StoryTemplateVariables
{
    public function asAssocArray(): array
    {
        $currentTitle = self::STORY_MAP[self::ZERO_BASED_INDEX_DEN_ALLTAG_FUER_EINE_STUNDE_VERGESSEN][self::CAPTION];

        return [
            self::TEMPLATE_KEY_HTML_HEAD => [
                self::TEMPLATE_KEY_TITLE => $this->buildTitle($currentTitle),
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
                    'text' => 'die Zeit nehme ich mir, um etwas nur für mich zu tun',
                ],
                'subQuote' => [
                    'text' => 'Einfach hierher kommen, sich bewegen und Spaß haben. Dann ist der Akku wieder voll!',
                ],
            ],
            'marion' => [
                'quoteText' => 'Wir sind im Alltag für alles und für jeden da und vergessen uns dabei! Die Stunde Auszeit bringt sooo viel!',
                'advantages' => [
                    'ich kann einfach da sein',
                    'abschalten ist möglich',
                    'der Stresslevel sinkt',
                ],
                'closingText' => 'Probier es einfach aus!',
            ],
            'callToAction' => [
                'caption' => [
                    'Komm dazu!',
                    'Trainiere zur Probe mit!',
                ],
            ],
            'zapper' => [
                'previous' => $this->getPreviousByCurrentTitle($currentTitle),
                'next' => $this->getNextByCurrentTitle($currentTitle),
            ],
        ];
    }
}