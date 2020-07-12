<?php

declare(strict_types=1);

use MitMarion\TemplateVariables\ContactFormTemplateVariables;
use MitMarion\TemplateVariables\Partial\CorporateFlyoutTemplateVariablesWithActiveMarker;
use MitMarion\TemplateVariables\Partial\StoriesTemplateVariables;
use MitMarion\TemplateVariables\ValueObject\CurrentPath;

require_once __DIR__ . '/../../bootstrap.php';

$validator = $factory->createContactFormValidator();
$result = $validator->validate();

$currentPath = CurrentPath::fromDirectory(__DIR__);
$templateVariables = new ContactFormTemplateVariables(
    new CorporateFlyoutTemplateVariablesWithActiveMarker(
        $currentPath
    ),
    new StoriesTemplateVariables(),
    $currentPath,
    $result->getTemplateVariables()
);
echo $factory->createContactFormPage($templateVariables)->asString();
