<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Mailer;

use TournayreLabs\Component\Mailer\VO\Email;
use TournayreLabs\Component\Mailer\VO\TemplatedEmail;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use Symfony\Component\Mailer\Envelope;

interface SendMailInterface
{
    /**
     * @param Email|TemplatedEmail $message
     *
     * @api
     *
     * @throws ThrowableInterface
     */
    public function send(Email|TemplatedEmail $message): void;

    /**
     * @param Email|TemplatedEmail $message
     * @param Envelope             $envelope
     *
     * @api
     *
     * @throws ThrowableInterface
     */
    public function sendWithEnvelope(Email|TemplatedEmail $message, Envelope $envelope): void;
}
