<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables;

use MitMarion\TemplateVariables\Partial\CorporateFlyoutTemplateVariables;
use MitMarion\TemplateVariables\Partial\StoriesTemplateVariables;

abstract class PageTemplateVariables implements TemplateVariables
{
    protected const TEMPLATE_KEY_HTML_HEAD = 'htmlHead';
    protected const TEMPLATE_KEY_TITLE = 'title';

    /**
     * @var CorporateFlyoutTemplateVariables
     */
    private $corporateFlyout;

    /**
     * @var StoriesTemplateVariables
     */
    private $stories;

    public function __construct(CorporateFlyoutTemplateVariables $corporateFlyout, StoriesTemplateVariables $stories)
    {
        $this->corporateFlyout = $corporateFlyout;
        $this->stories = $stories;
    }

    protected function buildBaseTemplateVariables(): array
    {
        return array_merge(
            $this->buildHtmlHead(),
            $this->corporateFlyout->asAssocArray(),
            $this->buildStoryFlyout(),
        );
    }

    abstract protected function getTitleValue(): string;

    private function buildStoryFlyout(): array
    {
        return $this->stories->asAssocArray();
    }

    private function buildHtmlHead(): array
    {
        return [
            self::TEMPLATE_KEY_HTML_HEAD => [
                self::TEMPLATE_KEY_TITLE => $this->buildTitle(),
            ],
        ];
    }

    private function buildTitle(): string
    {
        return $this->getTitleValue() . ' - mit Marion';
    }
}
