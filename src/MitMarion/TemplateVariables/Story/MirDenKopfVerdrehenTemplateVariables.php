<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\Story;

final class MirDenKopfVerdrehenTemplateVariables extends StoryTemplateVariables
{
    public function asAssocArray(): array
    {
        return [
            'member' => $this->getMemberAsAssocArray(),
            'marion' => [
                'quoteText' => 'Den Körper aus der Komfortzone holen. Sich drehen und verdrehen löst manch eine Blockade einfach auf!',
                'advantages' => [
                ],
                'closingText' => 'Probier es aus!',
            ],
            'callToAction' => [
                'caption' => [
                    'Meld dich an!<br />Komm dazu!',
                ],
            ],
        ];
    }

    public function getMemberAsAssocArray(): array
    {
        return [
            'mainQuote' => [
                'backgroundImage' => [
                    'url' => '/_assets/images/mir-den-kopf-verdrehen/teilnehmer-in-lockerungsuebungen.jpg',
                    'position' => 'center, center',
                ],
                'text' => 'dieser Outdoor-Sport bringt mir was',
            ],
            'subQuote' => [
                'text' => 'Nach einem langen Bürotag geht es mir nach den Dehn- und Lockerungsübungen einfach besser!',
            ],
        ];
    }

    public function getMetaDescriptionValue(): string
    {
        return 'Der Ausgleich zum anstrengenden Alltag. Outdoor Sport bringt dich wieder ins Lot.';
    }
}
