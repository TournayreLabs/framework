<?php

declare(strict_types=1);

namespace TournayreLabs\Tests\Unit\Component\Mailer\Configuration;

use PHPUnit\Framework\TestCase;
use TournayreLabs\Component\Mailer\Collection\EmailContactCollection;
use TournayreLabs\Component\Mailer\Configuration\MailerConfiguration;
use TournayreLabs\Component\Mailer\Types\AttachmentMaxSize;
use TournayreLabs\Component\Mailer\Types\EmailAddress;
use TournayreLabs\Component\Mailer\Types\EmailName;
use TournayreLabs\Component\Mailer\VO\EmailContact;

final class MailerConfigurationTest extends TestCase
{
    public function testFromAddress(): void
    {
        $from = EmailContact::create(
            EmailAddress::of('email@example.com'),
            EmailName::of('John Doe')
        );
        $configuration = MailerConfiguration::create()
            ->withFrom($from)
        ;
        self::assertTrue($configuration->from()->equalsTo($from)->isTrue());
    }

    public function testReplyToAddress(): void
    {
        $replyToAddress = EmailContact::create(
            EmailAddress::of('email@example.com'),
            EmailName::of('John Doe')
        );
        $configuration = MailerConfiguration::create()
            ->withReplyTo($replyToAddress)
        ;
        self::assertTrue($configuration->replyTos()->contains($replyToAddress)->isTrue());
    }

    public function testAttachmentsMaxSize(): void
    {
        $attachmentsMaxSize = AttachmentMaxSize::of('100');
        $configuration = MailerConfiguration::create()
            ->withAttachmentsMaxSize($attachmentsMaxSize)
        ;
        self::assertTrue($configuration->attachmentsMaxSize()->equalTo($attachmentsMaxSize->intValue())->isTrue());
    }

    public function testReplyToAddresses(): void
    {
        $replyTo1 = EmailContact::create(
            EmailAddress::of('email@example.com'),
            EmailName::of('John Doe')
        );
        $replyTo2 = EmailContact::create(
            EmailAddress::of('email@example.com'),
            EmailName::of('John Doe')
        );
        $replyToCollection = EmailContactCollection::asList([$replyTo1, $replyTo2]);
        $configuration = MailerConfiguration::create()
            ->withReplyTos($replyToCollection)
        ;

        self::assertTrue($configuration->replyTos()->contains($replyTo1)->isTrue());
        self::assertTrue($configuration->replyTos()->contains($replyTo2)->isTrue());
    }
}
