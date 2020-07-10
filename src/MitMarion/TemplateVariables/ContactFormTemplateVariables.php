<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables;

final class ContactFormTemplateVariables extends PageTemplateVariables
{
    public function asAssocArray(): array
    {
        return [
            self::TEMPLATE_KEY_HTML_HEAD => [
                self::TEMPLATE_KEY_TITLE => $this->buildTitle('Kontakt'),
            ],
        ];
    }
}
