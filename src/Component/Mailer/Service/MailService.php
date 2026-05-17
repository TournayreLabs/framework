<?php

declare(strict_types=1);

namespace TournayreLabs\Component\Mailer\Service;

use Symfony\Component\Mailer\Envelope;
use TournayreLabs\Component\Mailer\Configuration\MailerConfiguration;
use TournayreLabs\Component\Mailer\VO\Email;
use TournayreLabs\Component\Mailer\VO\TemplatedEmail;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Contracts\Log\LoggableInterface;
use TournayreLabs\Contracts\Log\LoggerInterface;
use TournayreLabs\Contracts\Mailer\SendMailInterface;

/**
 * Application service that sends e-mails and logs send operations.
 *
 * It delegates transport concerns to SendMailInterface and exposes current configuration.
 */
final readonly class MailService
{
    public function __construct(
        private LoggerInterface $logger,
        private SendMailInterface $sendMail,
        private MailerConfiguration $mailerConfiguration,
    ) {
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function send(Email|TemplatedEmail $message): void
    {
        $this->logSendingEmail($message);
        $this->sendMail->send($message);
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function sendWithEnvelope(Email|TemplatedEmail $message, Envelope $envelope): void
    {
        $this->logSendingEmail($message);
        $this->sendMail->sendWithEnvelope($message, $envelope);
    }

    private function logSendingEmail($message): void
    {
        $logContext = $message instanceof LoggableInterface ? $message->toLog() : [];
        $this->logger->info('Sending email', $logContext);
    }

    /**
     * @api
     */
    public function configuration(): MailerConfiguration
    {
        return $this->mailerConfiguration;
    }
}
