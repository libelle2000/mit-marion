<?php
declare(strict_types=1);

namespace Shared;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Factory
{
    public function createTwigEnvironment(string $templateRootPath, string $templateCachePath): Environment
    {
        $loader = new FilesystemLoader($templateRootPath);

        return new Environment(
            $loader, [
                'cache' => $templateCachePath,
            ]
        );
    }
}
