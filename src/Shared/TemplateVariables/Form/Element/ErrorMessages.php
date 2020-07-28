<?php
declare(strict_types=1);

namespace Shared\TemplateVariables\Form\Element;

use Shared\ValueObject\Base\BaseUniqueCollection;
use Shared\ValueObject\Base\Identifier;
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
            'errorMessages' => array_map(
                static function (ErrorMessage $errorMessage) {
                    return $errorMessage->getValue();
                },
                array_values($this->elements)
            ),
        ];
    }
}
