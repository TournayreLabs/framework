<?php

declare(strict_types=1);

namespace TournayreLabs\Tests\Unit\Component\Mailer\VO;

use TournayreLabs\Component\Mailer\Collection\EmailContactCollection;
use TournayreLabs\Component\Mailer\Collection\TagCollection;
use TournayreLabs\Component\Mailer\Types\EmailAddress;
use TournayreLabs\Component\Mailer\Types\EmailName;
use TournayreLabs\Component\Mailer\Types\EmailSubject;
use TournayreLabs\Component\Mailer\VO\Email;
use TournayreLabs\Component\Mailer\VO\TemplatedEmail;
use TournayreLabs\Component\Mailer\VO\EmailContact;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Primitives\Collection\FileCollection;
use TournayreLabs\Wrapper\SplFileInfo;
use PHPUnit\Framework\TestCase;

final class EmailTest extends TestCase
{
    /**
     * @throws ThrowableInterface
     */
    public function testCreateEmailWithEmptySubjectThrowsException(): void
    {
        self::expectException(\Exception::class);
        self::expectExceptionMessage('Email subject cannot be empty.');

        EmailSubject::of('');
    }

    /**
     * @throws ThrowableInterface
     */
    public function testValidateEmailWithoutToReturnsError(): void
    {
        $subject = EmailSubject::of('Test Subject');
        $emailAddress = EmailAddress::of('test@example.com');
        $emailName = EmailName::of('Test');
        $emailContact = EmailContact::create($emailAddress, $emailName);

        $email = TemplatedEmail::create($subject, $emailContact);

        $errors = $email->validate();

        self::assertArrayHasKey('to', $errors->toArray());
        self::assertEquals('validation.email.to.empty', $errors->offsetGet('to'));
    }

    /**
     * @throws ThrowableInterface
     */
    public function testIsValidReturnsFalseWhenEmailIsInvalid(): void
    {
        $subject = EmailSubject::of('Test Subject');
        $emailAddress = EmailAddress::of('test@example.com');
        $emailName = EmailName::of('Test');
        $emailContact = EmailContact::create($emailAddress, $emailName);

        $email = TemplatedEmail::create($subject, $emailContact);

        self::assertFalse($email->isValid()->isTrue());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testIsValidReturnsTrueWhenEmailIsValid(): void
    {
        $subject = EmailSubject::of('Test Subject');

        $emailAddress = EmailAddress::of('test@example.com');
        $emailName = EmailName::of('Test');
        $emailContact = EmailContact::create($emailAddress, $emailName);

        $toAddress = EmailAddress::of('test@example.com');
        $toName = EmailName::of('Test');
        $toContact = EmailContact::create($toAddress, $toName);

        $tos = EmailContactCollection::asList([$toContact]);

        $email = TemplatedEmail::create($subject, $emailContact)
            ->withTo($tos)
        ;

        self::assertTrue($email->isValid()->isTrue());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testWithTextThrowsExceptionWhenTextIsEmpty(): void
    {
        $subject = EmailSubject::of('Test Subject');

        $emailAddress = EmailAddress::of('test@example.com');
        $emailName = EmailName::of('Test');
        $emailContact = EmailContact::create($emailAddress, $emailName);

        $email = TemplatedEmail::create($subject, $emailContact);

        self::expectException(\Exception::class);
        self::expectExceptionMessage('Email text cannot be empty.');

        $email->withText('');
    }

    /**
     * @throws ThrowableInterface
     */
    public function testWithHtmlThrowsExceptionWhenHtmlIsEmpty(): void
    {
        $subject = EmailSubject::of('Test Subject');

        $emailAddress = EmailAddress::of('test@example.com');
        $emailName = EmailName::of('Test');
        $emailContact = EmailContact::create($emailAddress, $emailName);

        $email = TemplatedEmail::create($subject, $emailContact);

        self::expectException(\Exception::class);
        self::expectExceptionMessage('Email HTML cannot be empty.');

        $email->withHtml('');
    }

    /**
     * @throws ThrowableInterface
     */
    public function testFrom(): void
    {
        $subject = EmailSubject::of('Test Subject');
        $emailAddress = EmailAddress::of('test@example.com');
        $emailName = EmailName::of('Test');
        $emailContact = EmailContact::create($emailAddress, $emailName);

        $email = TemplatedEmail::create($subject, $emailContact);

        self::assertSame($emailContact, $email->from());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testTo(): void
    {
        $subject = EmailSubject::of('Test Subject');
        $emailAddress = EmailAddress::of('test@example.com');
        $emailName = EmailName::of('Test');
        $emailContact = EmailContact::create($emailAddress, $emailName);
        $to = EmailContactCollection::asList([$emailContact]);

        $email = Email::create($subject, $emailContact)
            ->withTo($to)
        ;

        self::assertSame($emailContact, $email->to()->first());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testCc(): void
    {
        $subject = EmailSubject::of('Test Subject');
        $emailAddress = EmailAddress::of('test@example.com');
        $emailName = EmailName::of('Test');
        $emailContact = EmailContact::create($emailAddress, $emailName);
        $cc = EmailContactCollection::asList([$emailContact]);

        $email = TemplatedEmail::create($subject, $emailContact)
            ->withCc($cc)
        ;

        self::assertSame($emailContact, $email->cc()->first());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testBcc(): void
    {
        $subject = EmailSubject::of('Test Subject');
        $emailAddress = EmailAddress::of('test@example.com');
        $emailName = EmailName::of('Test');
        $emailContact = EmailContact::create($emailAddress, $emailName);
        $bcc = EmailContactCollection::asList([$emailContact]);

        $email = TemplatedEmail::create($subject, $emailContact)
            ->withBcc($bcc)
        ;

        self::assertSame($emailContact, $email->bcc()->first());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testReplyTo(): void
    {
        $subject = EmailSubject::of('Test Subject');
        $emailAddress = EmailAddress::of('test@example.com');
        $emailName = EmailName::of('Test');
        $emailContact = EmailContact::create($emailAddress, $emailName);
        $replyTo = EmailContactCollection::asList([$emailContact]);

        $email = TemplatedEmail::create($subject, $emailContact)
            ->withReplyTo($replyTo)
        ;

        self::assertSame($emailContact, $email->replyTo()->first());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testAttachments(): void
    {
        $subject = EmailSubject::of('Test Subject');
        $emailAddress = EmailAddress::of('test@example.com');
        $emailName = EmailName::of('Test');
        $emailContact = EmailContact::create($emailAddress, $emailName);
        $splFileInfo = SplFileInfo::of('test.txt', 'test.txt', 'test.txt');
        $attachments = FileCollection::asList([$splFileInfo]);

        $email = TemplatedEmail::create($subject, $emailContact)
            ->withAttachments($attachments)
        ;

        self::assertSame($splFileInfo, $email->attachments()->first());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testTags(): void
    {
        $subject = EmailSubject::of('Test Subject');
        $emailAddress = EmailAddress::of('test@example.com');
        $emailName = EmailName::of('Test');
        $emailContact = EmailContact::create($emailAddress, $emailName);
        $tag1 = 'tag1';
        $tags = TagCollection::asMap([$tag1 => $tag1]);

        $email = TemplatedEmail::create($subject, $emailContact)
            ->withTags($tags)
        ;

        self::assertSame($tag1, $email->tags()->first());
    }
}
