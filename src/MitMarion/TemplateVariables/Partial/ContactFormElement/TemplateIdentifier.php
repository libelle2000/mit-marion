<?php

declare(strict_types=1);

namespace MitMarion\TemplateVariables\Partial\ContactFormElement;

interface TemplateIdentifier
{
    public const TEMPLATE_IDENTIFIER_SURNAME = 'surName';
    public const TEMPLATE_IDENTIFIER_PRENAME = 'preName';
    public const TEMPLATE_IDENTIFIER_E_MAIL = 'eMail';
    public const TEMPLATE_IDENTIFIER_CUSTOMER_MESSAGE = 'customerMessage';
    public const TEMPLATE_IDENTIFIER_DATA_PRIVACY = 'dataPrivacy';
}
