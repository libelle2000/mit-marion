<?php

declare(strict_types=1);

use MitMarion\TemplateVariables\ContactFormTemplateVariables;

require_once __DIR__ . '/../../bootstrap.php';

$templateVariables = new ContactFormTemplateVariables();
echo $factory->createContactFormPage($templateVariables)->asString();
