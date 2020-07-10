<?php

declare(strict_types=1);

use MitMarion\TemplateVariables\ContactFormTemplateVariables;
use MitMarion\TemplateVariables\Partial\CorporateFlyoutTemplateVariables;

require_once __DIR__ . '/../../bootstrap.php';

$templateVariables = new ContactFormTemplateVariables(
    new CorporateFlyoutTemplateVariables()
);
echo $factory->createContactFormPage($templateVariables)->asString();
