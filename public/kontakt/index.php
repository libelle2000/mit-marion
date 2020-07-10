<?php

declare(strict_types=1);

use MitMarion\TemplateVariables\ContactFormTemplateVariables;
use MitMarion\TemplateVariables\Partial\CorporateFlyoutTemplateVariablesWithActiveMarker;
use MitMarion\TemplateVariables\Partial\StoriesTemplateVariables;
use MitMarion\TemplateVariables\ValueObject\CurrentPath;

require_once __DIR__ . '/../../bootstrap.php';

$templateVariables = new ContactFormTemplateVariables(
    new CorporateFlyoutTemplateVariablesWithActiveMarker(
        CurrentPath::fromDirectory(__DIR__)
    ),
    new StoriesTemplateVariables()
);
echo $factory->createContactFormPage($templateVariables)->asString();
