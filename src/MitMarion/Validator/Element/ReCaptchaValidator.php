<?php

declare(strict_types=1);

namespace MitMarion\Validator\Element;

use Shared\ValueObject\Base\Identifier;
use Shared\Http\ParameterizedRequest;
use Shared\ReCaptcha\Client;
use Shared\TemplateVariables\Form\Element\CustomerInput;
use Shared\TemplateVariables\Form\Element\ErrorMessage;
use Shared\Validator\Element\ErrorElementResult;
use Shared\Validator\Element\ElementResult;
use Shared\Validator\Element\ElementValidator;

class ReCaptchaValidator extends ElementValidator
{
    private const PARAMETER_NAME = 'g-recaptcha-response';

    private Client $reCaptchaClient;

    public function __construct(ParameterizedRequest $request, Client $reCaptchaClient)
    {
        parent::__construct($request);
        $this->reCaptchaClient = $reCaptchaClient;
    }

    public function validate(): ElementResult
    {
        $errorMessages = $this->createEmptyErrorMessages();
        if (!$this->hasValue()) {
            $errorMessages->addErrorMessage(new ErrorMessage('Bitte bestätige, dass du kein Roboter bist!'));

            return new ErrorElementResult(CustomerInput::createEmpty(), $errorMessages);
        }
        if (!$this->reCaptchaClient->wasChallengeSuccessful($this->getParameterValue())) {
            $errorMessages->addErrorMessage(
                new ErrorMessage(
                    'Du hast die kleine Aufgabe leider nicht erfolgreich gelöst. Probiere es einfach nochmal!'                )
            );
        }
        if (!$errorMessages->isEmpty()) {
            return $this->createErrorResultWithCustomerInput($errorMessages);
        }

        return $this->createSuccessResult();
    }

    protected function getParameterIdentifier(): Identifier
    {
        return new Identifier(self::PARAMETER_NAME);
    }
}
