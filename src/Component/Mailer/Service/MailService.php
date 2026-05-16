<?php

declare(strict_types=1);

namespace TournayreLabs\Component\Mailer\Service;

use TournayreLabs\Component\Mailer\Configuration\MailerConfiguration;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Contracts\Log\LoggableInterface;
use TournayreLabs\Contracts\Log\LoggerInterface;
use TournayreLabs\Contracts\Mailer\SendMailInterface;

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
    // @phpstan-ignore-next-line
    public function send($message, $envelope = null): void
    {
        $this->logSendingEmail($message);
        $this->sendMail->send($message, $envelope);
    }

    // @phpstan-ignore-next-line
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
