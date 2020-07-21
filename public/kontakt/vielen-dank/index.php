<?php

declare(strict_types=1);

use MitMarion\TemplateVariables\Partial\CorporateFlyoutTemplateVariables;
use MitMarion\TemplateVariables\Partial\StoriesTemplateVariables;
use MitMarion\TemplateVariables\VielenDankTemplateVariables;

require_once __DIR__ . '/../../../bootstrap.php';
$templateVariables = new VielenDankTemplateVariables(
    new CorporateFlyoutTemplateVariables(),
    new StoriesTemplateVariables()
);
echo $factory->createVielenDankPage($templateVariables)->asString();
