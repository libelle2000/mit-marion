<?php

declare(strict_types=1);

use MitMarion\TemplateVariables\DenRueckenVerrueckenTemplateVariables;

require_once __DIR__ . '/../../bootstrap.php';

$templateVariables = new DenRueckenVerrueckenTemplateVariables();
echo $factory->createStoryPage($templateVariables)->asString();
