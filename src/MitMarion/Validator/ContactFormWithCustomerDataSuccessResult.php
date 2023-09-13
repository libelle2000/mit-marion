<?php
declare(strict_types=1);

namespace MitMarion\Validator;

use Shared\Validator\SuccessResult;

class ContactFormWithCustomerDataSuccessResult extends SuccessResult
{
    public function __construct(private readonly ValidatedContactFormData $validatedContactFormData)
    {
    }

    public function getValidatedContactFormData(): ValidatedContactFormData
    {
        return $this->validatedContactFormData;
    }
}
