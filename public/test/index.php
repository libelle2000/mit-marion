<?php

declare(strict_types=1);

use MitMarion\TemplateVariables\Story\DenRueckenVerrueckenTemplateVariables;

require_once __DIR__ . '/../../bootstrap.php';

$test = new DenRueckenVerrueckenTemplateVariables();
echo $factory->createDenRueckenVerrueckenPage($test)->asString();
