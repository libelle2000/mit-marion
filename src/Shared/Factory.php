<?php
declare(strict_types=1);

namespace Shared;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Factory
{
    private const TWIG_DEBUG = true;

    public function createTwigEnvironment(string $templateRootPath, string $templateCachePath): Environment
    {
        $loader = new FilesystemLoader($templateRootPath);

        $twig = new Environment(
            $loader, [
                'cache' => $templateCachePath,
            ]
        );
        if (self::TWIG_DEBUG) {
            $twig->addExtension(new \Twig\Extension\DebugExtension());
        }

        return $twig;
    }
}
