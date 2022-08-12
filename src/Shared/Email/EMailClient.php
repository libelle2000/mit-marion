<?php

declare(strict_types=1);

namespace Shared\Email;

abstract class EMailClient
{
    private SenderCaption $senderCaption;

    private SenderEmail $senderEmail;

    public function __construct(SenderCaption $senderCaption, SenderEmail $senderEmail)
    {
        mb_internal_encoding("UTF-8");
        $this->senderCaption = $senderCaption;
        $this->senderEmail = $senderEmail;
    }

    protected function getSenderCaption(): SenderCaption
    {
        return $this->senderCaption;
    }

    protected function getSenderEmail(): SenderEmail
    {
        return $this->senderEmail;
    }

    protected function sendMail(
        string $recipientCaption,
        string $recipientEmail,
        string $mailSubject,
        string $mailText
    ): bool {
        $sender = sprintf(
            '=?UTF-8?B?%s?= <%s>',
            base64_encode($this->senderCaption->getValue()),
            $this->senderEmail->getValue()
        );
        $recipient = sprintf('=?UTF-8?B?%s?= <%s>', base64_encode($recipientCaption), $recipientEmail);

        $subject = sprintf('=?UTF-8?B?%s?=', base64_encode($mailSubject));

        $headers = 'Content-Type: text/plain; charset=utf-8' . "\r\n";
        $headers .= 'Content-Transfer-Encoding: base64' . "\r\n";
        $headers .= sprintf('From: %s', $sender);

        $message = base64_encode($mailText);
        return mail($recipient, $subject, $message, $headers, '-f ' . $this->senderEmail->getValue());
    }
}
