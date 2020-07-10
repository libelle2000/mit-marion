<?php

declare(strict_types=1);

use MitMarion\TemplateVariables\DenRueckenVerrueckenTemplateVariables;
use MitMarion\TemplateVariables\Partial\CorporateFlyoutTemplateVariables;

require_once __DIR__ . '/../../bootstrap.php';

$templateVariables = new DenRueckenVerrueckenTemplateVariables(
    new CorporateFlyoutTemplateVariables()
);
echo $factory->createStoryPage($templateVariables)->asString();
