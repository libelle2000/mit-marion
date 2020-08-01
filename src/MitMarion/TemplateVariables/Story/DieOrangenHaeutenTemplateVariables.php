<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\Story;

final class DieOrangenHaeutenTemplateVariables extends StoryTemplateVariables
{
    public function asAssocArray(): array
    {
        return [
            'member' => $this->getMemberAsAssocArray(),
            'marion' => [
                'quoteText' => 'Dabei bleiben mit ganz viel Abwechslung, z. B. mit Zirkeltraining, das strafft den Körper!',
                'advantages' => [
                ],
                'closingText' => 'Hilft auch beim "Bierbäuchlein" ;-)',
            ],
            'callToAction' => [
                'caption' => [
                    'Ich freu mich auf dich!<br /> Komm dazu!',
                ],
            ],
        ];
    }

    public function getMemberAsAssocArray(): array
    {
        return [
            'mainQuote' => [
                'backgroundImage' => [
                    'url' => '/_assets/images/die-orangen-haeuten/teilnehmer-im-seitstuetz.jpg',
                    'position' => 'bottom, right',
                ],
                'text' => 'Toll, wie mir regelmäßige Bewegung dabei hilft!',
            ],
            'subQuote' => [
                'text' => 'Zum Sommer hin bin ich voller Elan - für die gute Strandfigur!',
            ],
        ];
    }

    public function getMetaDescriptionValue(): string
    {
        return 'Mit Outdoor Sport zur Strandfigur!';
    }
}
