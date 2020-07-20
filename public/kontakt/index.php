<?php

declare(strict_types=1);

use MitMarion\Http\Request;
use MitMarion\TemplateVariables\ContactFormTemplateVariables;
use MitMarion\TemplateVariables\Partial\CorporateFlyoutTemplateVariablesWithActiveMarker;
use MitMarion\TemplateVariables\Partial\StoriesTemplateVariables;
use MitMarion\TemplateVariables\ValueObject\CurrentPath;
use MitMarion\Validator\ContactFormWithCustomerDataSuccessResult;
use Shared\Environment\Environment;
use Shared\Validator\ErrorResult;

require_once __DIR__ . '/../../bootstrap.php';

if (!file_exists(__DIR__ . '/../../.env')) {
    throw new Exception('Environment variables not found.');
}
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

$environment = Environment::fromGlobals();
$request = Request::fromGlobals();
$currentPath = CurrentPath::fromDirectory(__DIR__);

if ($request->isPost()) {
    $validator = $factory->createContactFormValidator($request, $environment);
    $result = $validator->validate();
    if (!$result->hasErrors()) {
        /** @var ContactFormWithCustomerDataSuccessResult $result */
        $validatedCustomerInput = $result->getValidatedContactFormData();
        $emailClient = $factory->createEMailClient($validatedCustomerInput);

        if ($emailClient->send()) {
            header(sprintf('Location: %s', '/kontakt/vielen-dank/'), true, 303);
            exit(0);
        }

        header(sprintf('Location: %s', '/kontakt/fehler/'), true, 303);
        exit(0);
    }
    /** @var ErrorResult $result */
    $contactFormElementTemplateVariables = $result->getTemplateVariables();
} else {
    $contactFormElementTemplateVariables = $factory->createFormElementBuilder()
        ->buildContactFormElementsWithoutCustomerDataAndErrorsTemplateVariables();
}

$templateVariables = new ContactFormTemplateVariables(
    new CorporateFlyoutTemplateVariablesWithActiveMarker(
        $currentPath
    ),
    new StoriesTemplateVariables(),
    $currentPath,
    $contactFormElementTemplateVariables
);
echo $factory->createContactFormPage($templateVariables)->asString();
