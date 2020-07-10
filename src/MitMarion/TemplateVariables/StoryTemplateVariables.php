<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables;

use MitMarion\TemplateVariables\Partial\CorporateFlyoutTemplateVariables;
use MitMarion\TemplateVariables\Partial\StoriesTemplateVariablesWithActiveMarker;

abstract class StoryTemplateVariables extends PageTemplateVariables
{
    /**
     * @var StoriesTemplateVariablesWithActiveMarker
     */
    private $stories;

    public function __construct(
        CorporateFlyoutTemplateVariables $corporateFlyout,
        StoriesTemplateVariablesWithActiveMarker $stories
    ) {
        parent::__construct($corporateFlyout, $stories);
        $this->stories = $stories;
    }

    protected function buildZapperTemplateVariables(): array
    {
        return [
            'zapper' => [
                'previous' => $this->stories->getPrevious(),
                'next' => $this->stories->getNext(),
            ],
        ];
    }

    protected function getTitleValue(): string
    {
        return $this->stories->getCurrentTitle();
    }
}
