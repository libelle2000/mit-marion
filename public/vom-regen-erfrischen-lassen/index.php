<?php

declare(strict_types=1);

use MitMarion\TemplateVariables\Partial\CorporateFlyoutTemplateVariables;
use MitMarion\TemplateVariables\VomRegenErfrischenLassenTemplateVariables;

require_once __DIR__ . '/../../bootstrap.php';

$templateVariables = new VomRegenErfrischenLassenTemplateVariables(
    new CorporateFlyoutTemplateVariables()
);
echo $factory->createStoryPage($templateVariables)->asString();
