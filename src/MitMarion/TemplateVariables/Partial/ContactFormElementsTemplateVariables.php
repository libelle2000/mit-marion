<?php
declare(strict_types=1);

namespace MitMarion\TemplateVariables\Partial;

use MitMarion\TemplateVariables\TemplateVariables;
use Shared\TemplateVariables\Form\Element;

abstract class ContactFormElementsTemplateVariables implements TemplateVariables
{
    /**
     * @var Element
     */
    private $preName;
    /**
     * @var Element
     */
    private $surName;
    /**
     * @var Element
     */
    private $eMail;
    /**
     * @var Element
     */
    private $message;
    /**
     * @var Element
     */
    private $dataPrivacy;

    public function __construct(
        Element $preName,
        Element $surName,
        Element $eMail,
        Element $message,
        Element $dataPrivacy
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

    abstract protected function hasErrors(): bool;
}
