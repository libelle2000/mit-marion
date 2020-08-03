<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables;

final class MeineKurseTemplateVariables extends PageTemplateVariables
{
    public function asAssocArray(): array
    {
        return array_merge(
            $this->buildBaseTemplateVariables(),
        );
    }

    protected function getTitleValue(): string
    {
        return 'Die Kurse';
    }

    protected function getMetaDescription(): string
    {
        return 'Die aktuellen Kurse findest du hier.';
    }
}
