<?php
declare(strict_types=1);

namespace MitMarion\Validator;

use Shared\Validator\SuccessResult;

class ContactFormWithCustomerDataSuccessResult extends SuccessResult
{
    private ValidatedContactFormData $validatedContactFormData;

    public function __construct(ValidatedContactFormData $validatedContactFormData)
    {
        $this->validatedContactFormData = $validatedContactFormData;
    }

    public function getValidatedContactFormData(): ValidatedContactFormData
    {
        return $this->validatedContactFormData;
    }
}
