<?php

declare(strict_types=1);

namespace TournayreLabs\Symfony\Mailer\Adapter;

use TournayreLabs\Component\Mailer\Collection\EmailContactCollection;
use TournayreLabs\Component\Mailer\VO\Email;
use TournayreLabs\Component\Mailer\VO\EmailContact;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email as SymfonyEmail;

final class EmailAdapter
{
    /**
     * @api
     *
     * @throws ThrowableInterface
     */
    public static function fromMessage(Email $email): SymfonyEmail
    {
        $email->isValid()->throwIfFalse('Email is not valid.');

        $from = new Address(
            $email->from()->email()->toString(),
            $email->from()->name()->toString()
        );

        $tos = self::collectionToAddresses($email->to());
        $ccs = self::collectionToAddresses($email->cc());
        $bccs = self::collectionToAddresses($email->bcc());
        $replyTos = self::collectionToAddresses($email->replyTo());

        $symfonyEmail = new SymfonyEmail();
        $symfonyEmail->from($from);
        $symfonyEmail->subject($email->subject()->toString());
        $symfonyEmail->text($email->text()->toString());
        $symfonyEmail->html($email->html()->toString());
        $symfonyEmail->to(...$tos);
        $symfonyEmail->cc(...$ccs);
        $symfonyEmail->bcc(...$bccs);
        $symfonyEmail->replyTo(...$replyTos);

        foreach ($email->attachments()->toArray() as $attachment) {
            $symfonyEmail->attachFromPath($attachment->getPathname()->toString());
        }

        $headers = $symfonyEmail->getHeaders();
        foreach ($email->tags()->toArray() as $tagName => $tagValue) {
            $headers->addTextHeader($tagName, $tagValue);
        }

        return $symfonyEmail;
    }

    /**
     * @return array|Address[]
     */
    private static function collectionToAddresses(EmailContactCollection $emailContactCollection): array
    {
        if ($emailContactCollection->hasNoElement()->isTrue()) {
            return [];
        }

        return $emailContactCollection
            ->map(static fn (EmailContact $emailContact): Address => new Address(
                $emailContact->email()->toString(),
                $emailContact->name()->toString()
            ))
            ->toArray()
        ;
    }
}
