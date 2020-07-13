<?php
declare(strict_types=1);

namespace MitMarion\Validator\Item;

use MitMarion\Http\Request;
use Shared\TemplateVariables\Form\Element\ErrorMessages;

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

    abstract public function validate(): ErrorMessages;

    protected function createEmptyErrorMessages(): ErrorMessages
    {
        return new ErrorMessages();
    }
}
