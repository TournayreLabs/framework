<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Mailer;

use Symfony\Component\Mailer\Envelope;
use TournayreLabs\Component\Mailer\VO\Email;
use TournayreLabs\Component\Mailer\VO\TemplatedEmail;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

interface SendMailInterface
{
    /**
     * @api
     *
     * @throws ThrowableInterface
     */
    public function send(Email|TemplatedEmail $message): void;

    /**
     * @api
     *
     * @throws ThrowableInterface
     */
    public function sendWithEnvelope(Email|TemplatedEmail $message, Envelope $envelope): void;
}
