<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables;

final class DenAlltagFuerEineStundeVergessenTemplateVariables extends StoryTemplateVariables
{
    public function asAssocArray(): array
    {
        $currentTitle = $this->getTitleValue();

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
            ]
        );
    }
}
