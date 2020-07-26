<?php

declare(strict_types=1);

use MitMarion\TemplateVariables\Partial\CorporateFlyoutTemplateVariables;
use MitMarion\TemplateVariables\Partial\StoriesTemplateVariablesWithActiveMarker;
use MitMarion\TemplateVariables\Story\DieFazienFetzenTemplateVariables;
use MitMarion\TemplateVariables\StoryPageTemplateVariables;
use MitMarion\TemplateVariables\ValueObject\CurrentPath;

require_once __DIR__ . '/../../bootstrap.php';

$templateVariables = new StoryPageTemplateVariables(
    new CorporateFlyoutTemplateVariables(),
    new StoriesTemplateVariablesWithActiveMarker(
        CurrentPath::fromDirectory(__DIR__)
    ),
    new DieFazienFetzenTemplateVariables()
);
echo $factory->createStoryPage($templateVariables)->asString();
