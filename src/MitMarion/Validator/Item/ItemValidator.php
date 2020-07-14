<?php
declare(strict_types=1);

namespace MitMarion\Validator\Item;

use MitMarion\Http\Request;
use Shared\TemplateVariables\Form\Element\CustomerInput;
use Shared\TemplateVariables\Form\Element\ErrorMessages;
use Shared\Validator\Element\ElementResult;
use Shared\Validator\Element\SuccessElementResult;

abstract class ItemValidator
{
    /**
     * @var Request
     */
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    abstract public function validate(): ElementResult;

    protected function isSetRule(): bool
    {
        return $this->request->hasParameterWithValue($this->getParameterIdentifier());
    }

    protected function createEmptyErrorMessages(): ErrorMessages
    {
        return new ErrorMessages();
    }

    protected function createSuccessResult(): SuccessElementResult
    {
        return new SuccessElementResult(
            new CustomerInput($this->request->getParameter($this->getParameterIdentifier()))
        );
    }

    abstract protected function getParameterIdentifier(): string;
}
