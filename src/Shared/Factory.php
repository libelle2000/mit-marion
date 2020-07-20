<?php
declare(strict_types=1);

namespace Shared;

use Shared\BaseValueObject\Identifier;
use Shared\Environment\Environment;
use Shared\ReCaptcha\ApiKey;
use Shared\ReCaptcha\Client;
use Twig\Environment as TwigEnvironment;
use Twig\Loader\FilesystemLoader;

class Factory
{
    private const TWIG_DEBUG = true;

    public function createTwigEnvironment(string $templateRootPath, string $templateCachePath): TwigEnvironment
    {
        $loader = new FilesystemLoader($templateRootPath);

        $twig = new TwigEnvironment(
            $loader, [
                'cache' => $templateCachePath,
            ]
        );
        if (self::TWIG_DEBUG) {
            $twig->addExtension(new \Twig\Extension\DebugExtension());
        }

        return $twig;
    }

    public function createReCaptchaClient(Environment $environment): Client
    {
        return new Client(
            new ApiKey($environment->getValue(new Identifier('RECAPTCHA_API_KEY'))->getValue())
        );
    }
}
