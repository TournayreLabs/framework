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
    public function send($message): void
    {
        try {
            $message = $this->adaptMessage($message);

            $this->mailer->send($message);
        } catch (\Exception|TransportExceptionInterface $exception) {
            RuntimeException::fromThrowable($exception)->throw();
        }
    }

    /**
     * @param Email|TemplatedEmail $message
     *
     * @throws ThrowableInterface
     */
    public function sendWithEnvelope($message, $envelope): void
    {
        try {
            $message = $this->adaptMessage($message);

            $this->mailer->send($message, $envelope);
        } catch (\Exception|TransportExceptionInterface $exception) {
            RuntimeException::fromThrowable($exception)->throw();
        }
    }

    /**
     * @param Email|TemplatedEmail $message
     *
     * @throws ThrowableInterface
     */
    private function adaptMessage($message): RawMessage
    {
        if ($message instanceof TemplatedEmail) {
            return TemplatedEmailAdapter::fromMessage($message);
        }

        return EmailAdapter::fromMessage($message);
    }
}
