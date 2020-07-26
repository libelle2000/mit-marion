<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables;

use MitMarion\TemplateVariables\Partial\CorporateFlyoutTemplateVariables;
use MitMarion\TemplateVariables\Partial\StoryFlyoutTemplateVariables;

abstract class PageTemplateVariables implements TemplateVariables
{
    protected const TEMPLATE_KEY_HTML_HEAD = 'htmlHead';
    protected const TEMPLATE_KEY_TITLE = 'title';

    /**
     * @var CorporateFlyoutTemplateVariables
     */
    private $corporateFlyout;

    /**
     * @var StoryFlyoutTemplateVariables
     */
    private $storyFlyout;

    public function __construct(CorporateFlyoutTemplateVariables $corporateFlyout, StoryFlyoutTemplateVariables $storyFlyout)
    {
        $this->corporateFlyout = $corporateFlyout;
        $this->storyFlyout = $storyFlyout;
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
        return $this->storyFlyout->asAssocArray();
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
