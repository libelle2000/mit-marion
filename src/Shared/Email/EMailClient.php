<?php

declare(strict_types=1);

namespace Shared\Email;

abstract class EMailClient
{
    public function __construct()
    {
        mb_internal_encoding("UTF-8");
    }

    protected function sendMail(
        string $senderCaption,
        string $senderEmail,
        string $recipientCaption,
        string $recipientEmail,
        string $mailSubject,
        string $mailText
    ): bool {
        $sender = sprintf('=?UTF-8?B?%s?= <%s>', base64_encode($senderCaption), $senderEmail);
        $recipient = sprintf('=?UTF-8?B?%s?= <%s>', base64_encode($recipientCaption), $recipientEmail);

        $subject = sprintf('=?UTF-8?B?%s?=', base64_encode($mailSubject));

        $headers = 'Content-Type: text/plain; charset=utf-8' . "\r\n";
        $headers .= 'Content-Transfer-Encoding: base64' . "\r\n";
        $headers .= sprintf('From: %s', $sender);

        $message = base64_encode($mailText);

        return mail($recipient, $subject, $message, $headers);
    }
}
