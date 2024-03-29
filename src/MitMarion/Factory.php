<?php
declare(strict_types=1);

namespace MitMarion;

use MitMarion\Email\EMailClient;
use MitMarion\Http\Request;
use MitMarion\Page\ContactFormPage;
use MitMarion\Page\ErrorNotFoundPage;
use MitMarion\Page\FehlerPage;
use MitMarion\Page\HomePage;
use MitMarion\Page\ImpressumPage;
use MitMarion\Page\MeineKursePage;
use MitMarion\Page\UeberMichPage;
use MitMarion\Page\StoryPage;
use MitMarion\Page\VielenDankPage;
use MitMarion\Renderer\ContactFormRenderer;
use MitMarion\Renderer\ErrorNotFoundRenderer;
use MitMarion\Renderer\FehlerRenderer;
use MitMarion\Renderer\HomeRenderer;
use MitMarion\Renderer\ImpressumRenderer;
use MitMarion\Renderer\MeineKurseRenderer;
use MitMarion\Renderer\UeberMichRenderer;
use MitMarion\Renderer\StoryRenderer;
use MitMarion\Renderer\VielenDankRenderer;
use MitMarion\TemplateVariables\ContactFormTemplateVariables;
use MitMarion\TemplateVariables\HomeTemplateVariables;
use MitMarion\TemplateVariables\PageTemplateVariables;
use MitMarion\TemplateVariables\Partial\ContactFormElement\ContactFormElementBuilder;
use MitMarion\TemplateVariables\StoryPageTemplateVariables;
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
    public function __construct(private readonly SharedFactory $sharedFactory)
    {
    }

    public function createStoryPage(
        StoryPageTemplateVariables $storyTemplateVariables
    ): StoryPage {
        return new StoryPage(
            $this->createStoryRenderer(),
            $storyTemplateVariables
        );
    }

    public function createHomePage(HomeTemplateVariables $homeTemplateVariables): HomePage
    {
        return new HomePage(
            $this->createHomeRenderer(),
            $homeTemplateVariables
        );
    }

    public function createVielenDankPage(
        PageTemplateVariables $pageTemplateVariables
    ): VielenDankPage {
        return new VielenDankPage(
            $this->createVielenDankRenderer(),
            $pageTemplateVariables
        );
    }

    public function createImpressumPage(
        PageTemplateVariables $pageTemplateVariables
    ): ImpressumPage {
        return new ImpressumPage(
            $this->createImpressumRenderer(),
            $pageTemplateVariables
        );
    }

    public function createUeberMichPage(
        PageTemplateVariables $pageTemplateVariables
    ): UeberMichPage {
        return new UeberMichPage(
            $this->createUeberMichRenderer(),
            $pageTemplateVariables
        );
    }

    public function createMeineKursePage(
        PageTemplateVariables $pageTemplateVariables
    ): MeineKursePage {
        return new MeineKursePage(
            $this->createMeineKurseRenderer(),
            $pageTemplateVariables
        );
    }

    public function createFehlerPage(): FehlerPage
    {
        return new FehlerPage(
            $this->createFehlerRenderer(),
        );
    }

    public function create404Page(): ErrorNotFoundPage
    {
        return new ErrorNotFoundPage(
            $this->createErrorNotFoundPageRenderer(),
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

    private function createVielenDankRenderer(): VielenDankRenderer
    {
        return new VielenDankRenderer(
            $this->createTwigEnvironmentForNamespace()
        );
    }

    private function createImpressumRenderer(): ImpressumRenderer
    {
        return new ImpressumRenderer(
            $this->createTwigEnvironmentForNamespace()
        );
    }

    private function createUeberMichRenderer(): UeberMichRenderer
    {
        return new UeberMichRenderer(
            $this->createTwigEnvironmentForNamespace()
        );
    }

    private function createMeineKurseRenderer(): MeineKurseRenderer
    {
        return new MeineKurseRenderer(
            $this->createTwigEnvironmentForNamespace()
        );
    }

    private function createFehlerRenderer(): FehlerRenderer
    {
        return new FehlerRenderer(
            $this->createTwigEnvironmentForNamespace()
        );
    }

    private function createErrorNotFoundPageRenderer(): ErrorNotFoundRenderer
    {
        return new ErrorNotFoundRenderer(
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
