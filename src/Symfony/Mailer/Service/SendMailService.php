<?php

declare(strict_types=1);

namespace TournayreLabs\Symfony\Mailer\Service;

use TournayreLabs\Common\Exception\RuntimeException;
use TournayreLabs\Component\Mailer\VO\Email;
use TournayreLabs\Component\Mailer\VO\TemplatedEmail;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Contracts\Mailer\SendMailInterface;
use TournayreLabs\Symfony\Mailer\Adapter\EmailAdapter;
use TournayreLabs\Symfony\Mailer\Adapter\TemplatedEmailAdapter;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\Envelope;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\RawMessage;

final readonly class SendMailService implements SendMailInterface
{
    public function __construct(
        private MailerInterface $mailer,
    ) {
    }

    /**
     * @param Email|TemplatedEmail $message
     *
     * @throws ThrowableInterface
     */
    public function send(Email|TemplatedEmail $message): void
    {
        try {
            $message = $this->adaptMessage($message);

            $this->mailer->send($message);
        } catch (\Exception|TransportExceptionInterface $exception) {
            throw RuntimeException::fromThrowable($exception);
        }
    }

    /**
     * @param Email|TemplatedEmail $message
     * @param Envelope $envelope
     *
     * @throws ThrowableInterface
     */
    public function sendWithEnvelope(Email|TemplatedEmail $message, Envelope $envelope): void
    {
        try {
            $message = $this->adaptMessage($message);

            $this->mailer->send($message, $envelope);
        } catch (\Exception|TransportExceptionInterface $exception) {
            throw RuntimeException::fromThrowable($exception);
        }
    }

    /**
     * @param Email|TemplatedEmail $message
     *
     * @return RawMessage
     * @throws ThrowableInterface
     */
    private function adaptMessage(Email|TemplatedEmail $message): RawMessage
    {
        if ($message instanceof TemplatedEmail) {
            return TemplatedEmailAdapter::fromMessage($message);
        }

        return EmailAdapter::fromMessage($message);
    }
}
