<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\Partial;

use MitMarion\TemplateVariables\Partial\ContactFormElement\CustomerMessage;
use MitMarion\TemplateVariables\Partial\ContactFormElement\DataPrivacy;
use MitMarion\TemplateVariables\Partial\ContactFormElement\EMail;
use MitMarion\TemplateVariables\Partial\ContactFormElement\PreName;
use MitMarion\TemplateVariables\Partial\ContactFormElement\SurName;
use MitMarion\TemplateVariables\TemplateVariables;

class ContactFormElementsTemplateVariables implements TemplateVariables, ErrorFlag
{
    /**
     * @var PreName
     */
    private $preName;
    /**
     * @var SurName
     */
    private $surName;
    /**
     * @var EMail
     */
    private $eMail;
    /**
     * @var CustomerMessage
     */
    private $message;
    /**
     * @var DataPrivacy
     */
    private $dataPrivacy;

    public function __construct(
        PreName $preName,
        SurName $surName,
        EMail $eMail,
        CustomerMessage $message,
        DataPrivacy $dataPrivacy
    ) {
        $this->preName = $preName;
        $this->surName = $surName;
        $this->eMail = $eMail;
        $this->message = $message;
        $this->dataPrivacy = $dataPrivacy;
    }

    public function asAssocArray(): array
    {
        return array_merge_recursive(
            ['hasErrors' => $this->hasErrors()],
            $this->preName->asAssocArray(),
            $this->surName->asAssocArray(),
            $this->eMail->asAssocArray(),
            $this->message->asAssocArray(),
            $this->dataPrivacy->asAssocArray(),
        );
    }

    public function hasErrors(): bool
    {
        return false;
    }
}
