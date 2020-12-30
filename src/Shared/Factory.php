<?php
declare(strict_types=1);

namespace Shared;

use Shared\ValueObject\Base\Identifier;
use Shared\Environment\Environment;
use Shared\ReCaptcha\ApiKey;
use Shared\ReCaptcha\Client;
use Twig\Environment as TwigEnvironment;
use Twig\Loader\FilesystemLoader;

class Factory
{
    private const TWIG_PROD_DEV_TOGGLE_IS_DEV = false;

    private const TWIG_DEBUG = self::TWIG_PROD_DEV_TOGGLE_IS_DEV;
    private const DO_NOT_CACHE = false;

    public function createTwigEnvironment(string $templateRootPath, string $templateCachePath): TwigEnvironment
    {
        $loader = new FilesystemLoader($templateRootPath);

        $twig = new TwigEnvironment(
            $loader, [
                'debug' => self::TWIG_DEBUG,
                'strict_variables' => true,
                'cache' => self::TWIG_DEBUG ? self::DO_NOT_CACHE : $templateCachePath,
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
