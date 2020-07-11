<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables;

use MitMarion\TemplateVariables\Partial\ContactFormElementsWithCustomerDataAndErrorsTemplateVariables;
use MitMarion\TemplateVariables\Partial\CorporateFlyoutTemplateVariables;
use MitMarion\TemplateVariables\Partial\StoriesTemplateVariables;
use \Shared\TemplateVariables\TemplateVariables as SharedTemplateVariables;

final class ContactFormTemplateVariables extends PageTemplateVariables
{
    /**
     * @var ContactFormElementsWithCustomerDataAndErrorsTemplateVariables
     */
    private $contactFormElementsWithCustomerDataAndErrorsTemplateVariables;

    public function __construct(
        CorporateFlyoutTemplateVariables $corporateFlyout,
        StoriesTemplateVariables $stories,
        SharedTemplateVariables $contactFormElementsWithCustomerDataAndErrorsTemplateVariables
    ) {
        parent::__construct($corporateFlyout, $stories);
        $this->contactFormElementsWithCustomerDataAndErrorsTemplateVariables = $contactFormElementsWithCustomerDataAndErrorsTemplateVariables;
    }

    public function asAssocArray(): array
    {
        return array_merge(
            $this->buildBaseTemplateVariables(),
            [
                'contactFormElements' => $this->contactFormElementsWithCustomerDataAndErrorsTemplateVariables->asAssocArray(),
            ]
        );
    }

    protected function getTitleValue(): string
    {
        return 'Kontakt';
    }
}
