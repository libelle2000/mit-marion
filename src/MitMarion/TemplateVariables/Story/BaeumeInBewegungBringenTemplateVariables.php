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
            'insight' => [
                'headline' => 'Sport draußen in Delbrück',
                'paragraphs' => [
                    'Der Wald hinter dem Delbrücker Wohnmobilstellplatz bringt ein neues Trainingsgefühl. Wir balancieren z. B. über Baumstämme. Während wir unsere Übungen machen, fragen wir uns manches Mal, ob wir unseren Körper dehnen oder eher den Baum ;-).'
                ],
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
                'text' => 'Die Natur ist unser bester Trainings&shy;partner!',
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
