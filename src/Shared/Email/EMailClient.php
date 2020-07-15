<?php

declare(strict_types=1);

namespace Shared\Email;

class EMailClient
{
    public function __construct()
    {
        mb_internal_encoding("UTF-8");
    }

    protected function send(): bool
    {
// Define and Base64 encode the subject line
        $subject_text = 'Test email with German Umlauts öäüß';
        $subject = '=?UTF-8?B?' . base64_encode($subject_text) . '?=';

// Add custom headers
        $headers = 'Content-Type: text/plain; charset=utf-8' . "\r\n";
        $headers .= 'Content-Transfer-Encoding: base64';

// Define and Base64 the email body text
        $message = base64_encode('This email contains German Umlauts öäüß.');

// Send mail with custom headers
        return mail('recipient@domain.com', $subject, $message, $headers);
    }
}
