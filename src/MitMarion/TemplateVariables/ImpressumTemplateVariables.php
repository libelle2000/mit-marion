<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables;


final class ImpressumTemplateVariables extends PageTemplateVariables
{
    public function asAssocArray(): array
    {
        return array_merge(
            $this->buildBaseTemplateVariables(),
        );
    }

    protected function getTitleValue(): string
    {
        return 'Impressum';
    }
}
