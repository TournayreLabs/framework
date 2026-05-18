<?php

declare(strict_types=1);

namespace TournayreLabs\Symfony\Mailer\Adapter;

use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email as SymfonyEmail;
use TournayreLabs\Component\Mailer\Collection\EmailContactCollection;
use TournayreLabs\Component\Mailer\VO\Email;
use TournayreLabs\Component\Mailer\VO\EmailContact;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Primitives\Collection;
use TournayreLabs\Wrapper\SplFileInfo;

/**
 * Converts framework Email value objects to Symfony Mime Email instances.
 */
abstract class EmailAdapter
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

        Collection::of($email->attachments()->toArray())
            ->filterWith(static fn (mixed $attachment): bool => $attachment instanceof SplFileInfo)
            ->each(static function (mixed $attachment) use ($symfonyEmail): void {
                /** @var SplFileInfo $attachment */
                $pathname = $attachment->pathname();
                $symfonyEmail->attachFromPath($pathname->toString());
            });

        $headers = $symfonyEmail->getHeaders();
        Collection::of($email->tags()->toArray())
            ->filterWith(static fn (mixed $tagValue, mixed $tagName): bool => \is_string($tagName) && \is_scalar($tagValue))
            ->each(static function (mixed $tagValue, mixed $tagName) use ($headers): void {
                /** @var string $tagName */
                if (!\is_scalar($tagValue)) {
                    return;
                }

                $headers->addTextHeader($tagName, (string) $tagValue);
            });

        return $symfonyEmail;
    }

    /**
     * @throws ThrowableInterface
     *
     * @return array|Address[]
     */
    private static function collectionToAddresses(EmailContactCollection $emailContactCollection): array
    {
        if ($emailContactCollection->hasNoElement()->isTrue()) {
            return [];
        }

        $addresses = [];
        Collection::of($emailContactCollection->toArray())
            ->filterWith(static fn (mixed $emailContact): bool => $emailContact instanceof EmailContact)
            ->each(static function (mixed $emailContact) use (&$addresses): void {
                /** @var EmailContact $emailContact */
                $addresses[] = new Address(
                    $emailContact->email()->toString(),
                    $emailContact->name()->toString()
                );
            })
        ;

        /** @var array<Address> $addresses */

        return $addresses;
    }
}
