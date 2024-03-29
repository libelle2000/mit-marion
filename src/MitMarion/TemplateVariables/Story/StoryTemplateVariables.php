<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\Story;

use MitMarion\TemplateVariables\TemplateVariables;
use Shared\ValueObject\Link\Href;

abstract class StoryTemplateVariables implements TemplateVariables
{
    public function __construct(private readonly Href $linkHref)
    {
    }

    abstract public function getMemberAsAssocArray(): array;

    abstract public function getMetaDescriptionValue(): string;

    public function getLinkHrefAsAssocArray(): array
    {
        return [
            'href' => $this->linkHref->getValue(),
        ];
    }
}
