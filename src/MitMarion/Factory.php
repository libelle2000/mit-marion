<?php
declare(strict_types=1);

namespace MitMarion;

use MitMarion\Email\EMailClient;
use MitMarion\Http\Request;
use MitMarion\Page\ContactFormPage;
use MitMarion\Page\HomePage;
use MitMarion\Page\StoryPage;
use MitMarion\Renderer\ContactFormRenderer;
use MitMarion\Renderer\HomeRenderer;
use MitMarion\Renderer\StoryRenderer;
use MitMarion\TemplateVariables\ContactFormTemplateVariables;
use MitMarion\TemplateVariables\Partial\ContactFormElement\ContactFormElementBuilder;
use MitMarion\TemplateVariables\StoryTemplateVariables;
use MitMarion\Validator\ContactFormValidator;
use MitMarion\Validator\Element\CustomerMessageValidator;
use MitMarion\Validator\Element\DataPrivacyValidator;
use MitMarion\Validator\Element\EMailValidator;
use MitMarion\Validator\Element\PreNameValidator;
use MitMarion\Validator\Element\ReCaptchaValidator;
use MitMarion\Validator\Element\SurNameValidator;
use MitMarion\Validator\ValidatedContactFormData;
use Shared\Email\SenderCaption;
use Shared\Email\SenderEmail;
use Shared\Factory as SharedFactory;
use Twig\Environment as TwigEnvironment;
use Shared\Environment\Environment as SharedEnvironment;

class Factory
{
    /**
     * @var SharedFactory
     */
    private $sharedFactory;

    public function __construct(SharedFactory $sharedFactory)
    {
        $this->sharedFactory = $sharedFactory;
    }

    public function createStoryPage(
        StoryTemplateVariables $storyTemplateVariables
    ): StoryPage {
        return new StoryPage(
            $this->createStoryRenderer(),
            $storyTemplateVariables
        );
    }

    public function createHomePage(): HomePage
    {
        return new HomePage(
            $this->createHomeRenderer(),
        );
    }

    public function createContactFormValidator(Request $request, SharedEnvironment $environment): ContactFormValidator
    {
        return new ContactFormValidator(
            $this->createFormElementBuilder(),
            new ReCaptchaValidator($request, $this->sharedFactory->createReCaptchaClient($environment)),
            new PreNameValidator($request),
            new SurNameValidator($request),
            new EMailValidator($request),
            new CustomerMessageValidator($request),
            new DataPrivacyValidator($request)
        );
    }

    public function createEMailClient(ValidatedContactFormData $validatedContactFormData): EMailClient
    {
        return new EMailClient(
            new SenderCaption('Kontaktformular'),
            new SenderEmail('raus@mit-marion.de'),
            $validatedContactFormData
        );
    }

    private function createHomeRenderer(): HomeRenderer
    {
        return new HomeRenderer(
            $this->createTwigEnvironmentForNamespace()
        );
    }

    public function createContactFormPage(
        ContactFormTemplateVariables $contactFormTemplateVariables
    ): ContactFormPage {
        return new ContactFormPage(
            $this->createContactFormRenderer(),
            $contactFormTemplateVariables
        );
    }

    public function createFormElementBuilder(): ContactFormElementBuilder
    {
        return new ContactFormElementBuilder();
    }

    private function createContactFormRenderer(): ContactFormRenderer
    {
        return new ContactFormRenderer(
            $this->createTwigEnvironmentForNamespace()
        );
    }

    private function createStoryRenderer(): StoryRenderer
    {
        return new StoryRenderer(
            $this->createTwigEnvironmentForNamespace()
        );
    }

    private function createTwigEnvironmentForNamespace(): TwigEnvironment
    {
        return $this->sharedFactory->createTwigEnvironment(
            __DIR__ . '/../../template',
            __DIR__ . '/../../templateCache'
        );
    }
}
