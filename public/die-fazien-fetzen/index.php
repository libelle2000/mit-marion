<?php

declare(strict_types=1);

use MitMarion\TemplateVariables\DieFazienFetzenTemplateVariables;

require_once __DIR__ . '/../../bootstrap.php';

$test = new DieFazienFetzenTemplateVariables();
echo $factory->createStoryPage($test)->asString();
