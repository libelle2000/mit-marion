<?php

declare(strict_types=1);

use MitMarion\TemplateVariables\Partial\CorporateFlyoutTemplateVariables;
use MitMarion\TemplateVariables\Partial\StoriesTemplateVariablesWithActiveMarker;
use MitMarion\TemplateVariables\ValueObject\CurrentPath;
use MitMarion\TemplateVariables\VomRegenErfrischenLassenTemplateVariables;

require_once __DIR__ . '/../../bootstrap.php';

$templateVariables = new VomRegenErfrischenLassenTemplateVariables(
    new CorporateFlyoutTemplateVariables(),
    new StoriesTemplateVariablesWithActiveMarker(
        CurrentPath::fromDirectory(__DIR__)
    )
);
echo $factory->createStoryPage($templateVariables)->asString();
