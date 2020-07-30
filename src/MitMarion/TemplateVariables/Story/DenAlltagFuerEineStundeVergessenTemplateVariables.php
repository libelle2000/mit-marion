<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\Story;

final class DenAlltagFuerEineStundeVergessenTemplateVariables extends StoryTemplateVariables
{
    public function asAssocArray(): array
    {
        return [
            'member' => $this->getMemberAsAssocArray(),
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
        ];
    }

    public function getMemberAsAssocArray(): array
    {
        return [
            'mainQuote' => [
                'backgroundImage' => [
                    'url' => '/_assets/images/den-alltag-fuer-eine-stunde-vergessen/teilnehmer-lachen.jpg',
                    'position' => 'bottom, right',
                ],
                'text' => 'die Zeit nehme ich mir, um etwas nur für mich zu tun',
            ],
            'subQuote' => [
                'text' => 'Einfach hierher kommen, sich bewegen und Spaß haben. Dann ist der Akku wieder voll!',
            ],
        ];
    }
}
