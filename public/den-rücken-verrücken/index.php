<?php

declare(strict_types=1);

use MitMarion\TemplateVariables\Partial\CorporateFlyoutTemplateVariables;
use MitMarion\TemplateVariables\Partial\StoryFlyoutTemplateVariablesWithActiveMarker;
use MitMarion\TemplateVariables\Story\DenRueckenVerrueckenTemplateVariables;
use MitMarion\TemplateVariables\StoryPageTemplateVariables;
use MitMarion\TemplateVariables\ValueObject\CurrentPath;

require_once __DIR__ . '/../../bootstrap.php';

$templateVariables = new StoryPageTemplateVariables(
    new CorporateFlyoutTemplateVariables(),
    new StoryFlyoutTemplateVariablesWithActiveMarker(
        CurrentPath::fromDirectory(__DIR__)
    ),
    new DenRueckenVerrueckenTemplateVariables()
);
echo $factory->createStoryPage($templateVariables)->asString();
