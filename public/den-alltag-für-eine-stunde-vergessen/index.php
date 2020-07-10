<?php

declare(strict_types=1);

use MitMarion\TemplateVariables\DenAlltagFuerEineStundeVergessenTemplateVariables;
use MitMarion\TemplateVariables\Partial\CorporateFlyoutTemplateVariables;

require_once __DIR__ . '/../../bootstrap.php';

$templateVariables = new DenAlltagFuerEineStundeVergessenTemplateVariables(
    new CorporateFlyoutTemplateVariables()
);
echo $factory->createStoryPage($templateVariables)->asString();
