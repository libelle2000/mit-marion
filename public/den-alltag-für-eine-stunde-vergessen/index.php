<?php

declare(strict_types=1);

use MitMarion\TemplateVariables\DenAlltagFuerEineStundeVergessenTemplateVariables;

require_once __DIR__ . '/../../bootstrap.php';

$templateVariables = new DenAlltagFuerEineStundeVergessenTemplateVariables();
echo $factory->createStoryPage($templateVariables)->asString();
