<?php

declare(strict_types=1);

use MitMarion\TemplateVariables\MeineKurseTemplateVariables;
use MitMarion\TemplateVariables\Partial\CorporateFlyoutTemplateVariablesWithActiveMarker;
use MitMarion\TemplateVariables\Partial\StoryFlyoutTemplateVariables;
use MitMarion\TemplateVariables\ValueObject\CurrentPath;

require_once __DIR__ . '/../../bootstrap.php';
$templateVariables = new MeineKurseTemplateVariables(
    new CorporateFlyoutTemplateVariablesWithActiveMarker(
        CurrentPath::fromDirectory(__DIR__)
    ),
    new StoryFlyoutTemplateVariables()
);
echo $factory->createMeineKursePage($templateVariables)->asString();
