<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables;


final class UeberMichTemplateVariables extends PageTemplateVariables
{
    public function asAssocArray(): array
    {
        return array_merge(
            $this->buildBaseTemplateVariables(),
        );
    }

    protected function getTitleValue(): string
    {
        return 'Über mich und';
    }

    protected function getMetaDescription(): string
    {
        return 'Wer bin ich und was treibt mich an, Outdoor Sport zu trainieren.';
    }
}
