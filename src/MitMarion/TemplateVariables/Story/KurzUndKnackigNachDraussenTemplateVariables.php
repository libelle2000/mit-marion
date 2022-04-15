<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\Story;

final class KurzUndKnackigNachDraussenTemplateVariables extends StoryTemplateVariables
{
    public function asAssocArray(): array
    {
        return [
            'member' => $this->getMemberAsAssocArray(),
            'marion' => [
                'quoteText' => 'Spaß haben und Bewegung in der Gruppe - das macht glücklich und zufrieden',
                'advantages' => [
                    '45 Minuten Einheit',
                    'Ganzkörpertraining',
                    'Fit werden',
                ],
                'closingText' => 'Neugierig geworden?',
            ],
            'insight' => [
                'headline' => 'Das bringt das neue Sportangebot in Delbrück',
                'paragraphs' => [
                    '&quot;Kurz + Knackig&quot; - d. h. den Körper in 45 min richtig auf Touren bringen! Mit Sprints + Sprüngen und einer Menge Übungen mit dem eigenem Körpergewicht.',
                    'Sport draußen in Delbrück!'
                ],
            ],
            'callToAction' => [
                'caption' => [
                    'Meld dich an!',
                ],
            ],
        ];
    }

    public function getMemberAsAssocArray(): array
    {
        return [
            'mainQuote' => [
                'backgroundImage' => [
                    'url' => '/_assets/images/kurz-und-knackig-nach-draussen/sportschuhe-auf-losem-untergrund.jpg',
                    'position' => 'center bottom',
                ],
                'text' => 'Outdoor&shy;sport kurz und knackig',
            ],
            'subQuote' => [
                'text' => 'Kurze und knackige Einheit - das ist genau mein Ding!',
            ],
        ];
    }

    public function getMetaDescriptionValue(): string
    {
        return 'Zeit, einmal nur was für sich zu machen.';
    }
}
