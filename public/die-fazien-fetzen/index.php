<?php

declare(strict_types=1);

use MitMarion\TemplateVariables\DieFazienFetzenTemplateVariables;
use MitMarion\TemplateVariables\Partial\CorporateFlyoutTemplateVariables;

require_once __DIR__ . '/../../bootstrap.php';

$templateVariables = new DieFazienFetzenTemplateVariables(
    new CorporateFlyoutTemplateVariables()
);
echo $factory->createStoryPage($templateVariables)->asString();
