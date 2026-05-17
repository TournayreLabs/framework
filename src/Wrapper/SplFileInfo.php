<?php

declare(strict_types=1);

namespace TournayreLabs\Wrapper;

use TournayreLabs\Common\Assert\Assert;
use TournayreLabs\Common\Types\File\Content;
use TournayreLabs\Common\Types\File\Extension;
use TournayreLabs\Common\Types\File\Filename;
use TournayreLabs\Common\Types\File\Path;
use TournayreLabs\Common\VO\Memory;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Contracts\Log\LoggableInterface;
use TournayreLabs\Primitives\String_;
use Symfony\Component\Finder\SplFileInfo as SymfonySplFileInfo;

final readonly class SplFileInfo implements LoggableInterface
{
    private function __construct(
        private SymfonySplFileInfo $splFileInfo,
    ) {
    }

    /**
     * @api
     */
    public static function of(string $file, string $relativePath, string $relativePathname): self
    {
        $splFileInfo = new SymfonySplFileInfo($file, $relativePath, $relativePathname);

        return new self($splFileInfo);
    }

    /**
     * @return array<string, mixed>
     *
     * @throws ThrowableInterface
     */
    public function toLog(): array
    {
        return [
            'pathname' => $this->pathname(),
            'size' => $this->size()->humanReadable(),
        ];
    }

    /**
     * @api
     */
    public function relativePath(): Path
    {
        $relativePath = $this->splFileInfo->getRelativePath();

        return Path::of($relativePath);
    }

    /**
     * @api
     */
    public function relativePathname(): Path
    {
        $relativePathname = $this->splFileInfo->getRelativePathname();

        return Path::of($relativePathname);
    }

    /**
     * @api
     */
    public function filenameWithoutExtension(): String_
    {
        $filename = $this->splFileInfo->getFilenameWithoutExtension();

        return String_::fromString($filename);
    }

    /**
     * @api
     */
    public function contents(): Content
    {
        $contents = $this->splFileInfo->getContents();

        return Content::of($contents);
    }

    /**
     * @api
     */
    public function extension(): Extension
    {
        $extension = $this->splFileInfo->getExtension();

        return Extension::of($extension);
    }

    /**
     * @throws ThrowableInterface
     *
     * @api
     */
    public function size(): Memory
    {
        $size = $this->splFileInfo->getSize();

        Assert::notFalse($size, 'The file size is not available.');

        return Memory::fromBytes($size);
    }

    /**
     * @api
     */
    public function filename(): Filename
    {
        $filename = $this->splFileInfo->getFilename();

        return Filename::of($filename);
    }

    /**
     * @api
     */
    public function pathname(): Path
    {
        $pathname = $this->splFileInfo->getPathname();

        return Path::of($pathname);
    }
}
