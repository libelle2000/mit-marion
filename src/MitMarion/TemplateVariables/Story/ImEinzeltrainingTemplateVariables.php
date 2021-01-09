<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\Story;

final class ImEinzeltrainingTemplateVariables extends StoryTemplateVariables
{
    public function asAssocArray(): array
    {
        return [
            'member' => $this->getMemberAsAssocArray(),
            'marion' => [
                'quoteText' => 'Die kleine Auszeit bringt eine Menge Abwechselung in deinen Alltag!',
                'advantages' => [
                ],
                'closingText' => 'Neugierig geworden?',
            ],
            'insight' => [
                'headline' => 'Einzeltraining in Delbrück',
                'paragraphs' => [
                    'Wo möchtest du deinen Schwerpunkt setzen: Kraft, Ausdauer ...? Oder möchtest du dich "einfach nur" locker bewegen!?',
                    'Wir können individuell trainieren - beim Outdoorsport in Delbrück ist das möglich!',
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
                    'url' => '/_assets/images/im-einzeltraining/crunch-beim-einzeltraining.jpg',
                    'position' => 'bottom, left',
                ],
                'text' => 'mit Bewegung und frische Luft das Immunsystem stärken!',
            ],
            'subQuote' => [
                'text' => 'Ob vor der Arbeit im Home-Office oder in der Mittagspause. Oder wenn du einfach wieder durchstarten willst.',
            ],
        ];
    }

    public function getMetaDescriptionValue(): string
    {
        return 'Mit Outdoor Sport zur Strandfigur!';
    }
}
