<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\Story;

final class DenRueckenVerrueckenTemplateVariables extends StoryTemplateVariables
{
    public function asAssocArray(): array
    {
        return [
            'member' => $this->getMemberAsAssocArray(),
            'marion' => [
                'quoteText' => 'Ja, Sport ohne Hilfsmittel ist ein Allrounder, das freut den Rücken, denn...',
                'advantages' => [
                    'wir kräftigen ',
                    'wir mobilisieren',
                    'wir stabilisieren',
                    'wir dehnen',
                ],
                'closingText' => 'Neugierig geworden?',
            ],
            'insight' => [
                'headline' => 'Beim Outdoorsport in Delbrück ist alles möglich!',
                'paragraphs' => [
                    'Bänke sind nicht nur zum Sitzen da – ein Armstütz oder auch als Hilfsmittel zur Dehnung – beim Outdoorsport in Delbrück ist alles möglich! Da staunt mancher Hund und erst der Hundebesitzer! Und die Kid\'s fragen ihre Eltern "was machen die da?"'
                ],
            ],
            'callToAction' => [
                'caption' => [
                    'Mach mit! Komm dazu!',
                ],
            ],
        ];
    }

    public function getMemberAsAssocArray(): array
    {
        return [
            'mainQuote' => [
                'backgroundImage' => [
                    'url' => '/_assets/images/den-ruecken-verruecken/stuetz-an-parkbank.jpg',
                    'position' => 'right top',
                ],
                'text' => 'dass ich da nicht eher drauf gekommen bin!',
            ],
            'subQuote' => [
                'text' => 'Ich habe einige Rückenkurse hinter mir, aber das Training mit dem eigenen Körpergewicht bringt mir wirklich was!',
            ],
        ];
    }

    public function getMetaDescriptionValue(): string
    {
        return 'Outdoor Sport verbindet Rückengymnastik mit Spaß!';
    }
}
