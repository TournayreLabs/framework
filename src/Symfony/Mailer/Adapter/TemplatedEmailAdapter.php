<?php

declare(strict_types=1);

namespace TournayreLabs\Symfony\Mailer\Adapter;

use Symfony\Bridge\Twig\Mime\TemplatedEmail as SymfonyTemplatedEmail;
use TournayreLabs\Component\Mailer\VO\Email;
use TournayreLabs\Component\Mailer\VO\TemplatedEmail;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Primitives\Collection;
use TournayreLabs\Wrapper\SplFileInfo;

/**
 * Converts framework templated emails to Symfony Twig templated email objects.
 */
final class TemplatedEmailAdapter extends EmailAdapter
{
    /**
     * @param TemplatedEmail|Email $email
     *
     * @throws ThrowableInterface
     */
    public static function fromMessage($email): SymfonyTemplatedEmail
    {
        $symfonyEmail = parent::fromMessage($email);

        $templatedEmail = new SymfonyTemplatedEmail();
        $templatedEmail->subject($symfonyEmail->getSubject() ?? '');
        $templatedEmail->from(...$symfonyEmail->getFrom());
        $templatedEmail->to(...$symfonyEmail->getTo());
        $templatedEmail->cc(...$symfonyEmail->getCc());
        $templatedEmail->bcc(...$symfonyEmail->getBcc());
        $templatedEmail->replyTo(...$symfonyEmail->getReplyTo());

        Collection::of($email->attachments()->toArray())
            ->filterWith(static fn (mixed $attachment): bool => $attachment instanceof SplFileInfo)
            ->each(static function (mixed $attachment) use ($templatedEmail): void {
                /** @var SplFileInfo $attachment */
                $pathname = $attachment->pathname();
                $templatedEmail->attachFromPath($pathname->toString());
            });

        $headers = $templatedEmail->getHeaders();
        Collection::of($email->tags()->toArray())
            ->filterWith(static fn (mixed $tagValue, mixed $tagName): bool => \is_string($tagName) && \is_scalar($tagValue))
            ->each(static function (mixed $tagValue, mixed $tagName) use ($headers): void {
                /** @var string $tagName */
                if (!\is_scalar($tagValue)) {
                    return;
                }

                $headers->addTextHeader($tagName, (string) $tagValue);
            });

        if ($email instanceof TemplatedEmail) {
            $templatedEmail->htmlTemplate($email->htmlTemplatePath()->toString());
            $templatedEmail->textTemplate($email->textTemplatePath()->toString());
            $templatedEmail->context($email->templateContextCollection()->toArray());
        }

        return $templatedEmail;
    }
}
