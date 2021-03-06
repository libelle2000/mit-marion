<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables;

use MitMarion\TemplateVariables\Partial\ContactFormElementsWithCustomerDataAndErrorsTemplateVariables;
use MitMarion\TemplateVariables\Partial\CorporateFlyoutTemplateVariables;
use MitMarion\TemplateVariables\Partial\StoryFlyoutTemplateVariables;
use MitMarion\TemplateVariables\ValueObject\CurrentPath;
use \Shared\TemplateVariables\TemplateVariables as SharedTemplateVariables;

final class ContactFormTemplateVariables extends PageTemplateVariables
{
    private const HTTP_POST = 'post';
    /**
     * @var CurrentPath
     */
    private $currentPath;

    /**
     * @var ContactFormElementsWithCustomerDataAndErrorsTemplateVariables
     */
    private $contactFormElementsWithCustomerDataAndErrorsTemplateVariables;

    public function __construct(
        CorporateFlyoutTemplateVariables $corporateFlyout,
        StoryFlyoutTemplateVariables $storyFlyout,
        CurrentPath $currentPath,
        SharedTemplateVariables $contactFormElementsWithCustomerDataAndErrorsTemplateVariables
    ) {
        parent::__construct($corporateFlyout, $storyFlyout);
        $this->currentPath = $currentPath;
        $this->contactFormElementsWithCustomerDataAndErrorsTemplateVariables = $contactFormElementsWithCustomerDataAndErrorsTemplateVariables;
    }

    public function asAssocArray(): array
    {
        return array_merge(
            $this->buildBaseTemplateVariables(),
            [
                'form' => [
                    'action' => $this->currentPath->asUrlPath(),
                    'method' => self::HTTP_POST,
                ],
                'contactFormElements' => $this->contactFormElementsWithCustomerDataAndErrorsTemplateVariables->asAssocArray(),
            ]
        );
    }

    protected function getTitleValue(): string
    {
        return 'Kontakt';
    }

    protected function getMetaDescription(): string
    {
        return 'Der direkte Draht zu Marion';
    }
}
