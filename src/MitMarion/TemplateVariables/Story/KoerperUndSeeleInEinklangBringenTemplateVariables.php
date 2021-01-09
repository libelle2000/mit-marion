<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\Story;

final class KoerperUndSeeleInEinklangBringenTemplateVariables extends StoryTemplateVariables
{
    public function asAssocArray(): array
    {
        return [
            'member' => $this->getMemberAsAssocArray(),
            'marion' => [
                'quoteText' => 'Ja, viel mehr ist es wirklich nicht!',
                'advantages' => [
                ],
                'closingText' => 'Lass dich drauf ein!',
            ],
            'insight' => [
                'headline' => 'Wie wirkt sich Outdoorsport auf den Stresspegel aus?',
                'paragraphs' => [
                    'Bei meinen Kursen in Delbrück besonders gut. Frag doch mal in deiner Familie, im Freundeskreis, Eltern aus Delbrücker Kindergärten und Schulen. Bewegung + frische Luft: das lässt den Stresspegel sinken.'
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
                    'url' => '/_assets/images/koerper-und-seele-in-einklang-bringen/teilnehmer-in-yogastellung.jpg',
                    'position' => '50% 30%',
                ],
                'text' => 'KÖRPER +&nbsp;SEELE =&nbsp;ICH',
            ],
            'subQuote' => [
                'text' => 'Bewegung + frische Luft machen gute Laune und bringen Körper und Seele ein Stück weit zusammen!',
            ],
        ];
    }

    public function getMetaDescriptionValue(): string
    {
        return 'Körper und Seele - Bewegung an der frischen Luft tut einfach gut!';
    }
}
