<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Mailer;

use TournayreLabs\Component\Mailer\VO\Email;
use TournayreLabs\Component\Mailer\VO\TemplatedEmail;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

interface SendMailInterface
{
    /**
     * @param Email|TemplatedEmail $message
     *
     * @api
     *
     * @throws ThrowableInterface
     */
    public function send($message): void;

    /**
     * @param Email|TemplatedEmail $message
     *
     * @api
     *
     * @throws ThrowableInterface
     */
    public function sendWithEnvelope($message, $envelope): void;
}
