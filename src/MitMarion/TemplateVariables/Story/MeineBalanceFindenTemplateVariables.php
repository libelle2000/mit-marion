<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\Story;

final class MeineBalanceFindenTemplateVariables extends StoryTemplateVariables
{
    public function asAssocArray(): array
    {
        return [
            'member' => $this->getMemberAsAssocArray(),
            'marion' => [
                'quoteText' => 'Ja, jeder trainiert so wie es ihm möglich ist. Wir lachen und haben Spaß - das gehört auch dazu :-)! ',
                'advantages' => [
                ],
                'closingText' => 'Sport im Wohlfühlbereich ist angesagt!',
            ],
            'insight' => [
                'headline' => 'Sport draußen in Delbrück',
                'paragraphs' => [
                    'Training auf der Wiese am Hallenbad, in der Nähe der Delbrücker Stadtverwaltung: Da traut sich manch ein Teilnehmer auch mal auf die Rutsche, in die Schaukel oder an die Seilbahn. Und ich stehe da und denke "meine Teilnehmer sind glücklich wie die Kinder". Das ist Sport draußen in Delbrück :-)'
                ],
            ],
            'callToAction' => [
                'caption' => [
                    'Komm dazu!<br />Sei dabei!',
                ],
            ],
        ];
    }

    public function getMemberAsAssocArray(): array
    {
        return [
            'mainQuote' => [
                'backgroundImage' => [
                    'url' => '/_assets/images/meine-balance-finden/teilnehmer-lachen.jpg',
                    'position' => '50% 40%',
                ],
                'text' => 'Klasse - Bewegung macht mich glücklich und zufrieden!',
            ],
            'subQuote' => [
                'text' => 'Meine kid\'s finden es cool, wie gut gelaunt und "easy" ich nach Hause komme!',
            ],
        ];
    }

    public function getMetaDescriptionValue(): string
    {
        return 'Sport, für die ich mal nicht die Überwindung brauche!';
    }
}
