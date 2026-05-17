<?php

declare(strict_types=1);

namespace TournayreLabs\Common\Types;

use TournayreLabs\Primitives\String_;
use TournayreLabs\Primitives\Traits\StringTypeTrait;
use Webmozart\Assert\Assert;

/**
 * Represents a filesystem path that can target either a directory or a file.
 *
 * Use this value object to compose and normalize path fragments safely.
 */
final class DirectoryOrFile
{
    use StringTypeTrait;

    public static function of(string $value): self
    {
        Assert::startsWith($value, '/', 'The path must start with a slash');

        return new self(String_::fromString($value));
    }

    /**
     * @api
     */
    public function suffixWith(string $suffix): self
    {
        $suffixString = String_::fromString($suffix)
            ->trimEnd('/')
            ->ensureStart('/')
            ->toString()
        ;

        $newPath = $this->value
            ->trimEnd('/')
            ->ensureStart('/')
            ->append($suffixString)
        ;

        return self::of($newPath->toString());
    }

    /**
     * @api
     */
    public function prefixWith(string $prefix): self
    {
        $prefixString = String_::fromString($prefix)
            ->trimEnd('/')
            ->ensureStart('/')
            ->toString()
        ;

        $newPath = $this->value
            ->trimEnd('/')
            ->ensureStart('/')
            ->prepend($prefixString)
        ;

        return self::of($newPath->toString());
    }
}
