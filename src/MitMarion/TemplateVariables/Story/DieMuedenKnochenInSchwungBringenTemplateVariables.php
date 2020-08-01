<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\Story;

final class DieMuedenKnochenInSchwungBringenTemplateVariables extends StoryTemplateVariables
{
    public function asAssocArray(): array
    {
        return [
            'member' => $this->getMemberAsAssocArray(),
            'marion' => [
                'quoteText' => 'Das ist kein "Hexenwerk". Bei mir im Kurs geht es um Ganzkörpertraining. Das bringt den ganzen Körper in Schwung!',
                'advantages' => [
                ],
                'closingText' => 'Da ist für jeden etwas dabei!',
            ],
            'callToAction' => [
                'caption' => [
                    'Hast du Lust?<br /> Komm dazu!',
                ],
            ],
        ];
    }

    public function getMemberAsAssocArray(): array
    {
        return [
            'mainQuote' => [
                'backgroundImage' => [
                    'url' => '/_assets/images/die-mueden-knochen-in-schwung-bringen/teilnehmer-im-luftsprung.jpg',
                    'position' => 'center, center',
                ],
                'text' => 'Auf geht\'s!',
            ],
            'subQuote' => [
                'text' => 'Wenn ich sehe, wie fit und beweglich so manch einer in meinem Alter ist...',
            ],
        ];
    }

    public function getMetaDescriptionValue(): string
    {
        return 'Outdoor Sport ist etwas für jedes Fitnesslevel.!';
    }
}
