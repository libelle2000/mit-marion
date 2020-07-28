<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\Story;

use MitMarion\TemplateVariables\TemplateVariables;
use Shared\ValueObject\Link\Href;

abstract class StoryTemplateVariables implements TemplateVariables
{
    /**
     * @var Href
     */
    private $linkHref;

    public function __construct(Href $linkHref)
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
