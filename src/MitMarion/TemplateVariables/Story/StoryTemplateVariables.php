<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\Story;

use MitMarion\TemplateVariables\TemplateVariables;
use MitMarion\TemplateVariables\ValueObject\LinkHref;

abstract class StoryTemplateVariables implements TemplateVariables
{
    /**
     * @var LinkHref
     */
    private $linkHref;

    public function __construct(LinkHref $linkHref)
    {
        $this->linkHref = $linkHref;
    }

    abstract public function getMemberAsAssocArray(): array;

    public function getLinkHrefAsAssocArray(): array
    {
        return [
            'href' => $this->linkHref->getValue(),
        ];
    }
}
