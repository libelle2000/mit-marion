<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\Partial;

use MitMarion\TemplateVariables\TemplateVariables;
use Shared\TemplateVariables\Form\Element;

abstract class ContactFormElementsTemplateVariables implements TemplateVariables
{

    public function __construct(private readonly Element $reCaptcha, private readonly Element $preName, private readonly Element $surName, private readonly Element $eMail, private readonly Element $message, private readonly Element $dataPrivacy)
    {
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
