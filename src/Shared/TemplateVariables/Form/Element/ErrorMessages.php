<?php
declare(strict_types=1);

namespace Shared\TemplateVariables\Form\Element;

use Shared\BaseValueObject\BaseUniqueCollection;
use Shared\BaseValueObject\Identifier;
use Shared\TemplateVariables\TemplateVariables;

class ErrorMessages extends BaseUniqueCollection implements TemplateVariables
{
    public function addErrorMessage(ErrorMessage $errorMessage): void
    {
        $this->addUniqueElement($errorMessage, new Identifier($errorMessage->getValue()));
    }

    public function asAssocArray(): array
    {
        return [
            'errorMessages' => array_values($this->elements),
        ];
    }
}
