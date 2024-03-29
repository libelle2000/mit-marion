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
            'insight' => [
                'headline' => 'Das bringt das neue Sportangebot in Delbrück',
                'paragraphs' => [
                    'Während die Delbrücker Fussballer dienstags auf dem Sportplatz trainieren, staunt so manch ein Walker oder Spaziergänger, welche "Kunststücke" wir mit dem Ball veranstalten – Spaß ist garantiert!'
                ],
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
                    'position' => '50% 40%',
                ],
                'text' => "Auf geht's!",
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
