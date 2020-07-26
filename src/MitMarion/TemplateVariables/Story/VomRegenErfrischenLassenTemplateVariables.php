<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\Story;

final class VomRegenErfrischenLassenTemplateVariables implements StoryTemplateVariables
{
    public function asAssocArray(): array
    {
        return [
            'member' => [
                'mainQuote' => [
                    'backgroundImage' => [
                        'url' => '/_assets/images/dummy.jpg',
                        'position' => 'right, bottom',
                    ],
                    'text' => 'das Sofa lockt, aber ich gehe doch los und bin ganz stolz auf mich!',
                ],
                'subQuote' => [
                    'text' => 'Ich beneide all diejenigen, die bei Wind und Wetter unterwegs sind! Wie geht das?',
                ],
            ],
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
}
