<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables;

use MitMarion\TemplateVariables\Partial\CorporateFlyoutTemplateVariables;
use MitMarion\TemplateVariables\Partial\StoriesTemplateVariablesWithActiveMarker;

abstract class StoryPageTemplateVariables extends PageTemplateVariables
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

    public function asAssocArray(): array
    {
        return array_merge(
            $this->buildBaseTemplateVariables(),
            $this->buildZapperTemplateVariables(),
            $this->asAssocArray_()
        );
    }

    protected function getTitleValue(): string
    {
        return $this->stories->getCurrentTitle();
    }

    private function buildZapperTemplateVariables(): array
    {
        return [
            'zapper' => [
                'previous' => $this->stories->getPrevious(),
                'next' => $this->stories->getNext(),
            ],
        ];
    }
}
