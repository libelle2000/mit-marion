<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables;

use MitMarion\TemplateVariables\Partial\CorporateFlyoutTemplateVariables;
use Shared\TemplateVariables\TemplateVariables;

abstract class PageTemplateVariables implements TemplateVariables
{
    protected const TEMPLATE_KEY_HTML_HEAD = 'htmlHead';
    protected const TEMPLATE_KEY_TITLE = 'title';

    /**
     * @var CorporateFlyoutTemplateVariables
     */
    private $corporateFlyout;

    public function __construct(CorporateFlyoutTemplateVariables $corporateFlyout)
    {
        $this->corporateFlyout = $corporateFlyout;
    }

    protected function buildBaseTemplateVariables(): array
    {
        return array_merge(
            $this->buildHtmlHead(),
            $this->corporateFlyout->asAssocArray(),
        );
    }

    abstract protected function getTitleValue(): string;

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
