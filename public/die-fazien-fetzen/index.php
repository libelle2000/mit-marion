<?php

declare(strict_types=1);

use MitMarion\TemplateVariables\DieFazienFetzenTemplateVariables;
use MitMarion\TemplateVariables\Partial\CorporateFlyoutTemplateVariables;
use MitMarion\TemplateVariables\Partial\StoriesTemplateVariablesWithActiveMarker;
use MitMarion\TemplateVariables\ValueObject\CurrentPath;

require_once __DIR__ . '/../../bootstrap.php';

$templateVariables = new DieFazienFetzenTemplateVariables(
    new CorporateFlyoutTemplateVariables(),
    new StoriesTemplateVariablesWithActiveMarker(
        CurrentPath::fromDirectory(__DIR__)
    )
);
echo $factory->createStoryPage($templateVariables)->asString();
