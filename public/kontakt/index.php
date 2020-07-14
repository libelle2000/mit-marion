<?php

declare(strict_types=1);

use MitMarion\Http\Request;
use MitMarion\TemplateVariables\ContactFormTemplateVariables;
use MitMarion\TemplateVariables\Partial\CorporateFlyoutTemplateVariablesWithActiveMarker;
use MitMarion\TemplateVariables\Partial\StoriesTemplateVariables;
use MitMarion\TemplateVariables\ValueObject\CurrentPath;
use Shared\Validator\ErrorResult;

require_once __DIR__ . '/../../bootstrap.php';

$request = Request::fromGlobals();
$currentPath = CurrentPath::fromDirectory(__DIR__);

if ($request->isPost()) {
    $validator = $factory->createContactFormValidator($request);
    $result = $validator->validate();
    if(!$result->hasErrors()) {
        header(sprintf('Location: %s', '/kontakt/vielen-dank/'), true, 303);
        exit(0);
    }
    /** @var ErrorResult $result */
    $contactFormElementTemplateVariables = $result->getTemplateVariables();
}
else {
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
