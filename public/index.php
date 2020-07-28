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
$storyFlyout = new StoryFlyoutTemplateVariables();
echo $factory->createHomePage(
    new HomeTemplateVariables(
        new CorporateFlyoutTemplateVariables(),
        $storyFlyout,
        new StoriesTeaserTemplateVariables(
            new VomRegenErfrischenLassenTemplateVariables(
                $storyFlyout->getLinkHrefForVomRegenErfrischenLassen()
            ),
            new DenRueckenVerrueckenTemplateVariables(
                $storyFlyout->getLinkHrefForDenRueckenVerruecken()
            ),
            new DieFazienFetzenTemplateVariables(
                $storyFlyout->getLinkHrefForDieFazienFetzen()
            ),
            new DenAlltagFuerEineStundeVergessenTemplateVariables(
                $storyFlyout->getLinkHrefForDenAlltagFuerEineStundeVergessen()
            ),
        )
    )
)->asString();
