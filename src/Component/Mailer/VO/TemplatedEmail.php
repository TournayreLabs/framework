<?php

declare(strict_types=1);

namespace TournayreLabs\Component\Mailer\VO;

use TournayreLabs\Common\Collection\TemplateContextCollection;
use TournayreLabs\Common\Collection\Validation\ValidationCollection;
use TournayreLabs\Common\Types\HtmlTemplatePath;
use TournayreLabs\Common\Types\TextTemplatePath;
use TournayreLabs\Component\Mailer\Collection\EmailContactCollection;
use TournayreLabs\Component\Mailer\Collection\TagCollection;
use TournayreLabs\Component\Mailer\Types\EmailHtml;
use TournayreLabs\Component\Mailer\Types\EmailSubject;
use TournayreLabs\Component\Mailer\Types\EmailText;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Contracts\Types\TypeValidationInterface;
use TournayreLabs\Primitives\Collection\FileCollection;

final class TemplatedEmail extends Email implements TypeValidationInterface
{
    protected function __construct(
        EmailSubject $subject,
        EmailContact $from,
        EmailContactCollection $to,
        EmailContactCollection $cc,
        EmailContactCollection $bcc,
        EmailContactCollection $replyTo,
        FileCollection $attachments,
        TagCollection $tags,
        EmailText $text,
        EmailHtml $html,
        private HtmlTemplatePath $htmlTemplatePath,
        private TextTemplatePath $textTemplatePath,
        private TemplateContextCollection $templateContextCollection,
    ) {
        parent::__construct(
            subject: $subject,
            from: $from,
            to: $to,
            cc: $cc,
            bcc: $bcc,
            replyTo: $replyTo,
            attachments: $attachments,
            tags: $tags,
            text: $text,
            html: $html,
        );
    }

    public static function create(
        EmailSubject $subject,
        EmailContact $from,
    ): self {
        return new self(
            subject: $subject,
            from: $from,
            to: EmailContactCollection::asList([]),
            cc: EmailContactCollection::asList([]),
            bcc: EmailContactCollection::asList([]),
            replyTo: EmailContactCollection::asList([]),
            attachments: FileCollection::asList([]),
            tags: TagCollection::asMap([]),
            text: EmailText::asNull(),
            html: EmailHtml::asNull(),
            htmlTemplatePath: HtmlTemplatePath::empty(),
            textTemplatePath: TextTemplatePath::empty(),
            templateContextCollection: TemplateContextCollection::asMap([]),
        );
    }

    /**
     * @api
     */
    public function htmlTemplatePath(): HtmlTemplatePath
    {
        return $this->htmlTemplatePath;
    }

    /**
     * @api
     */
    public function textTemplatePath(): TextTemplatePath
    {
        return $this->textTemplatePath;
    }

    /**
     * @api
     */
    public function templateContextCollection(): TemplateContextCollection
    {
        return $this->templateContextCollection;
    }

    /**
     * @api
     */
    public function withHtmlTemplatePath(HtmlTemplatePath $htmlTemplatePath): self
    {
        $clone = clone $this;
        $clone->htmlTemplatePath = $htmlTemplatePath;

        return $clone;
    }

    /**
     * @api
     */
    public function withTextTemplatePath(TextTemplatePath $textTemplatePath): self
    {
        $clone = clone $this;
        $clone->textTemplatePath = $textTemplatePath;

        return $clone;
    }

    /**
     * @api
     */
    public function withContext(TemplateContextCollection $templateContextCollection): self
    {
        $clone = clone $this;
        $clone->templateContextCollection = $templateContextCollection;

        return $clone;
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function validate(): ValidationCollection
    {
        return ValidationCollection::asMap([])
            ->set(
                'template',
                'validation.templated_email.template.empty',
                fn () => $this->htmlTemplatePath->isEmpty()->isTrue()
                    && $this->textTemplatePath->isEmpty()->isTrue()
            )
        ;
    }
}
