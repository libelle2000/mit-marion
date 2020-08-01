<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\Story;

final class BaeumeInBewegungBringenTemplateVariables extends StoryTemplateVariables
{
    public function asAssocArray(): array
    {
        return [
            'member' => $this->getMemberAsAssocArray(),
            'marion' => [
                'quoteText' => 'Natur = Überraschung, Spiel und Spannung - alles ist möglich!',
                'advantages' => [
                ],
                'closingText' => 'Du verpasst wirklich was, darum ...',
            ],
            'callToAction' => [
                'caption' => [
                    'Komm dazu!',
                ],
            ],
        ];
    }

    public function getMemberAsAssocArray(): array
    {
        return [
            'mainQuote' => [
                'backgroundImage' => [
                    'url' => '/_assets/images/baeume-in-bewegung-bringen/teilnehmer-haengt-am-baum.jpg',
                    'position' => 'top, center',
                ],
                'text' => 'Die Natur ist unser bester Trainingspartner!',
            ],
            'subQuote' => [
                'text' => 'Hallensport ist langweilig! - Hier toben wir auch mal auf der Wiese, funktionieren Parkbänke um, zaubern im Winter Schnee-Engel und ich bin mittlerweile stärker als der Wind :-) :-)!',
            ],
        ];
    }

    public function getMetaDescriptionValue(): string
    {
        return 'Natur = Überraschung, Spiel und Spannung. Das ist Outdoor Sport!';
    }
}
