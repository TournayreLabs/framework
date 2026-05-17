<?php

declare(strict_types=1);

namespace TournayreLabs\Tests\Unit\Component\Mailer\VO;

use TournayreLabs\Common\Collection\TemplateContextCollection;
use TournayreLabs\Common\Types\HtmlTemplatePath;
use TournayreLabs\Common\Types\TextTemplatePath;
use TournayreLabs\Component\Mailer\Types\EmailAddress;
use TournayreLabs\Component\Mailer\Types\EmailName;
use TournayreLabs\Component\Mailer\Types\EmailSubject;
use TournayreLabs\Component\Mailer\VO\EmailContact;
use TournayreLabs\Component\Mailer\VO\TemplatedEmail;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use PHPUnit\Framework\TestCase;

final class TemplatedEmailTest extends TestCase
{
    /**
     * @throws ThrowableInterface
     */
    public function testHtmlTemplatePath(): void
    {
        $subject = EmailSubject::of('Test Subject');
        $emailAddress = EmailAddress::of('test@example.com');
        $emailName = EmailName::of('Test');
        $emailContact = EmailContact::create($emailAddress, $emailName);
        $htmlTemplatePath = HtmlTemplatePath::of('test.html');

        $email = TemplatedEmail::create($subject, $emailContact)
            ->withHtmlTemplatePath($htmlTemplatePath)
        ;

        self::assertTrue($email->htmlTemplatePath()->equalsTo('test.html')->isTrue());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testTextTemplatePath(): void
    {
        $subject = EmailSubject::of('Test Subject');
        $emailAddress = EmailAddress::of('test@example.com');
        $emailName = EmailName::of('Test');
        $emailContact = EmailContact::create($emailAddress, $emailName);
        $textTemplatePath = TextTemplatePath::of('test.txt');

        $email = TemplatedEmail::create($subject, $emailContact)
            ->withTextTemplatePath($textTemplatePath)
        ;

        self::assertTrue($email->textTemplatePath()->equalsTo('test.txt')->isTrue());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testTemplateContextCollection(): void
    {
        $subject = EmailSubject::of('Test Subject');
        $emailAddress = EmailAddress::of('test@example.com');
        $emailName = EmailName::of('Test');
        $emailContact = EmailContact::create($emailAddress, $emailName);

        $input = [
            'key' => 'value',
            'date' => new \DateTime('204-06-23'),
        ];
        $templateContextCollection = TemplateContextCollection::asMap($input);

        $email = TemplatedEmail::create($subject, $emailContact)
            ->withContext($templateContextCollection)
        ;

        self::assertEquals($input, $email->templateContextCollection()->toArray());
        self::assertTrue($email->templateContextCollection()->has('key')->isTrue());
        self::assertTrue($email->templateContextCollection()->has('date')->isTrue());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testValidateWithHtmlTemplatePath(): void
    {
        $subject = EmailSubject::of('Test Subject');
        $emailAddress = EmailAddress::of('test@example.com');
        $emailName = EmailName::of('Test');
        $emailContact = EmailContact::create($emailAddress, $emailName);
        $htmlTemplatePath = HtmlTemplatePath::of('test.html');

        $email = TemplatedEmail::create($subject, $emailContact)
            ->withHtmlTemplatePath($htmlTemplatePath)
        ;

        self::assertTrue($email->validate()->isValid()->isTrue());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testValidateWithTextTemplatePath(): void
    {
        $subject = EmailSubject::of('Test Subject');
        $emailAddress = EmailAddress::of('test@example.com');
        $emailName = EmailName::of('Test');
        $emailContact = EmailContact::create($emailAddress, $emailName);
        $textTemplatePath = TextTemplatePath::of('test.txt');

        $email = TemplatedEmail::create($subject, $emailContact)
            ->withTextTemplatePath($textTemplatePath)
        ;

        self::assertTrue($email->validate()->isValid()->isTrue());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testValidateWithoutTemplate(): void
    {
        $subject = EmailSubject::of('Test Subject');
        $emailAddress = EmailAddress::of('test@example.com');
        $emailName = EmailName::of('Test');
        $emailContact = EmailContact::create($emailAddress, $emailName);

        $email = TemplatedEmail::create($subject, $emailContact);

        self::assertTrue($email->validate()->isValid()->isFalse());
        self::assertSame('validation.templated_email.template.empty', $email->validate()->toString());
    }
}
