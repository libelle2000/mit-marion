<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\Story;

use MitMarion\TemplateVariables\TemplateVariables;
use Shared\ValueObject\Link\Href;

abstract class StoryTemplateVariables implements TemplateVariables
{
    private Href $linkHref;

    public function __construct(Href $linkHref)
    {
        $this->linkHref = $linkHref;
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
