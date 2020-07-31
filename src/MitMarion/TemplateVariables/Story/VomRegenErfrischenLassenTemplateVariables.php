<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\Story;

final class VomRegenErfrischenLassenTemplateVariables extends StoryTemplateVariables
{
    public function asAssocArray(): array
    {
        return [
            'member' => $this->getMemberAsAssocArray(),
            'marion' => [
                'quoteText' => 'Gemeinsam! Und ich zeige dir wie! Spaß ist garantiert... :-)',
                'advantages' => [
                ],
                'closingText' => 'Wir verpassen dem Regen gute Laune ;-)',
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
                    'url' => '/_assets/images/vom-regen-erfrischen-lassen/teilnehmer-im-regen.jpg',
                    'position' => 'bottom, center',
                ],
                'text' => 'das Sofa lockt, aber ich gehe doch los und bin ganz stolz auf mich!',
            ],
            'subQuote' => [
                'text' => 'Ich beneide all diejenigen, die bei Wind und Wetter unterwegs sind! Wie geht das?',
            ],
        ];
    }

    public function getMetaDescriptionValue(): string
    {
        return 'Outdoor Sport bringt sogar bei Regen Spaß!';
    }
}
