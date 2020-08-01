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
                    'position' => 'top, center',
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
