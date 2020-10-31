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
            'insight' => [
                'headline' => 'Outdoor-Sport in Delbrück als Auszeit im Alltag',
                'paragraphs' => [
                    'Eine Teilnehmerin erzählte mir von einer Unterhaltung mit ihrem Mann. Er sagte zu ihr: "Du bist für alles und jeden da. Wenn du Spaß an Bewegung in der Natur hast, gönn dir doch diese eine Stunde in der Woche!" Gesagt – getan: Sie war bei der Probestunde dabei und hat sich gleich fest angemeldet.'
                ],
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
                    'url' => '/_assets/images/den-alltag-fuer-eine-stunde-vergessen/teilnehmer-werfen-ball-hoch.jpg',
                    'position' => 'center, center',
                ],
                'text' => 'die Zeit nehme ich mir, um etwas nur für mich zu tun',
            ],
            'subQuote' => [
                'text' => 'Einfach hierher kommen, sich bewegen und Spaß haben. Dann ist der Akku wieder voll!',
            ],
        ];
    }

    public function getMetaDescriptionValue(): string
    {
        return 'Zeit, einmal nur was für sich zu machen.';
    }
}
