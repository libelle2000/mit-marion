<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\Story;

final class UeberStockUndSteinTemplateVariables extends StoryTemplateVariables
{
    public function asAssocArray(): array
    {
        return [
            'member' => $this->getMemberAsAssocArray(),
            'marion' => [
                'quoteText' => 'Ja, die Natur bietet Abwechslung! Wir finden "Sportgeräte" vor und bewegen uns auf unter- schiedlichstem Untergrund. Wir trainieren Ausdauer, Kraft und Kondition.',
                'advantages' => [
                ],
                'closingText' => 'Weiterer Pluspunkt: Unser Immunsystem wird gestärkt!',
            ],
            'insight' => [
                'headline' => 'Sportangebot draußen in Delbrück',
                'paragraphs' => [
                    'Wir steigen über Baumstämme, springen über Baumwurzeln und freuen uns über das Laub unter den Füßen. Es geht weiter über den Waldweg. Unter einer Lichtung bleiben wir kurz stehen: Die Arme Richtung Baumkronen und tief einatmen – Sport mal anders im Delbrücker Land!'
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
                    'url' => '/_assets/images/ueber-stock-und-stein/laeufer-im-dichten-wald.jpg',
                    'position' => 'center top',
                ],
                'text' => 'in der Natur zu sein, ist einfach klasse!',
            ],
            'subQuote' => [
                'text' => 'Sport in der Halle mache ich seit Jahren, aber jetzt merke ich den Unterschied',
            ],
        ];
    }

    public function getMetaDescriptionValue(): string
    {
        return 'Beim Outdoor Sport auch mal die üblichen Wege verlassen!';
    }
}
