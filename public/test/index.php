<?php

declare(strict_types=1);

use MitMarion\TemplateVariables\Story\DieFazienFetzenTemplateVariables;

require_once __DIR__ . '/../../bootstrap.php';

$test = new DieFazienFetzenTemplateVariables();
echo $factory->createStoryPage($test)->asString();
