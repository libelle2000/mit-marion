<?php

declare(strict_types=1);

use MitMarion\TemplateVariables\Partial\CorporateFlyoutTemplateVariables;
use MitMarion\TemplateVariables\Partial\StoryFlyoutTemplateVariablesWithActiveMarker;
use MitMarion\TemplateVariables\Story\MirDenKopfVerdrehenTemplateVariables;
use MitMarion\TemplateVariables\StoryPageTemplateVariables;
use MitMarion\TemplateVariables\ValueObject\CurrentPath;

require_once __DIR__ . '/../../bootstrap.php';

$storyFlyout = new StoryFlyoutTemplateVariablesWithActiveMarker(
    CurrentPath::fromDirectory(__DIR__)
);
$templateVariables = new StoryPageTemplateVariables(
    new CorporateFlyoutTemplateVariables(),
    $storyFlyout,
    new MirDenKopfVerdrehenTemplateVariables($storyFlyout->getCurrentLinkHref())
);
echo $factory->createStoryPage($templateVariables)->asString();
