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
                'headline' => 'Outdoorsport in Delbrück - als Einzeltraining',
                'paragraphs' => [
                    'Auch die besten Übungen sind nicht unbedingt für jeden geeignet. Mit den Kenntnissen aus dem Reha-Bereich gehe ich ganz individuell auf dich und deinen Leistungslevel ein.',
                    'Nach Verletzungen starten wir langsam wieder in die Bewegung. Da ist Kräftigung und Dehnung, Mobilisation und Stabilisierung das A und O.',
                    'Ein Training für einen starken Rücken macht uns im Büroalltag fit und natürlich auch, wenn du beruflich den ganzen Tag auf den Beinen bist.',
                    'Wir finden nach Absprache für dich und deinen Terminkalender genau die richtige Zeit und den richtigen Ort in und um Delbrück herum!',
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
                    'position' => 'bottom right',
                ],
                'text' => 'mit Bewegung und frischer Luft das Immunsystem stärken!',
            ],
            'subQuote' => [
                'text' => 'Bewegung vor der Arbeit oder in der Mittagspause ist eine tolle Sache! Dann ist der Kopf wieder frei. Oder ich nutze einfach den Vormittag, wenn die kid´s in der Schule sind :-)',
            ],
        ];
    }

    public function getMetaDescriptionValue(): string
    {
        return 'Im Einzeltraining ist der Outdoor Sport ganz individuell zugeschnitten!';
    }
}
