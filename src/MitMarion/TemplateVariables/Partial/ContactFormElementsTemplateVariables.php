<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\Partial;

use MitMarion\TemplateVariables\TemplateVariables;
use Shared\TemplateVariables\Form\Element;

abstract class ContactFormElementsTemplateVariables implements TemplateVariables
{

    private Element $reCaptcha;

    private Element $preName;

    private Element $surName;

    private Element $eMail;

    private Element $message;

    private Element $dataPrivacy;

    public function __construct(
        Element $reCaptcha,
        Element $preName,
        Element $surName,
        Element $eMail,
        Element $message,
        Element $dataPrivacy
    ) {
        $this->reCaptcha = $reCaptcha;
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
            $this->reCaptcha->asAssocArray(),
            $this->preName->asAssocArray(),
            $this->surName->asAssocArray(),
            $this->eMail->asAssocArray(),
            $this->message->asAssocArray(),
            $this->dataPrivacy->asAssocArray(),
        );
    }

    abstract protected function hasErrors(): bool;
}
