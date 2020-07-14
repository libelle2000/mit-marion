<?php
declare(strict_types=1);

namespace Shared\TemplateVariables\Form;

use MitMarion\TemplateVariables\Partial\ContactFormElement\CustomerMessage;
use MitMarion\TemplateVariables\Partial\ContactFormElement\DataPrivacy;
use MitMarion\TemplateVariables\Partial\ContactFormElement\EMail;
use MitMarion\TemplateVariables\Partial\ContactFormElement\PreName;
use MitMarion\TemplateVariables\Partial\ContactFormElement\SurName;
use MitMarion\TemplateVariables\Partial\ContactFormElementsWithoutCustomerDataAndErrorsTemplateVariables;
use Shared\TemplateVariables\Form\Element\Label;
use Shared\TemplateVariables\Form\Element\Placeholder;
use Shared\TemplateVariables\Form\Element\ValidationRegexPattern;
use Shared\TemplateVariables\TemplateVariables;

class FormElementBuilder
{
    public function createContactFormElementTemplateVariables(): TemplateVariables
    {
        return new ContactFormElementsWithoutCustomerDataAndErrorsTemplateVariables(
            new PreName(
                new Label('Vorname'),
                new Placeholder('dein Vorname'),
                new ValidationRegexPattern('')
            ),
            new SurName(
                new Label('Nachname'),
                new Placeholder('dein Nachname'),
                new ValidationRegexPattern('')
            ),
            new EMail(
                new Label('E-Mail'),
                new Placeholder('deine E-Mail Adresse'),
                new ValidationRegexPattern('')
            ),
            new CustomerMessage(
                new Label('Nachricht'),
                new Placeholder('Meine Nachricht an dich, Marion'),
                new ValidationRegexPattern('')
            ),
            new DataPrivacy(
                new Label('dataPrivacy'),
                new Placeholder('Ich habe die Datenschutzerklärung gelesen und akzeptiere sie.'),
                new ValidationRegexPattern('')
            ),
        );
    }
}
