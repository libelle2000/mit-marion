<?php

declare(strict_types=1);

use MitMarion\TemplateVariables\HomeTemplateVariables;
use MitMarion\TemplateVariables\Partial\CorporateFlyoutTemplateVariables;
use MitMarion\TemplateVariables\Partial\StoryFlyoutTemplateVariables;
use MitMarion\TemplateVariables\Story\DenAlltagFuerEineStundeVergessenTemplateVariables;
use MitMarion\TemplateVariables\Story\DenRueckenVerrueckenTemplateVariables;
use MitMarion\TemplateVariables\Story\DieFazienFetzenTemplateVariables;
use MitMarion\TemplateVariables\Story\StoriesTeaserTemplateVariables;
use MitMarion\TemplateVariables\Story\VomRegenErfrischenLassenTemplateVariables;

require_once __DIR__ . '/../bootstrap.php';
echo $factory->createHomePage(
    new HomeTemplateVariables(
        new CorporateFlyoutTemplateVariables(),
        new StoryFlyoutTemplateVariables(),
        new StoriesTeaserTemplateVariables(
            new VomRegenErfrischenLassenTemplateVariables(),
            new DenRueckenVerrueckenTemplateVariables(),
            new DieFazienFetzenTemplateVariables(),
            new DenAlltagFuerEineStundeVergessenTemplateVariables(),
        )
    )
)->asString();
