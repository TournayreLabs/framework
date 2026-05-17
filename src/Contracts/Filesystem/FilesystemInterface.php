<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Filesystem;

use TournayreLabs\Primitives\Bool_;
use TournayreLabs\Primitives\Collection\FileCollection;

interface FilesystemInterface
{
    public static function from(string $directoryOrFile): self;

    public function createDirectory(string $directory): void;

    public function removeDirectory(string $directory): void;

    public function removeFile(string $file): void;

    public function createFile(string $file, string $content): void;

    public function copyFile(string $source, string $destination): void;

    public function copyDirectory(string $source, string $destination): void;

    public function moveFile(string $source, string $destination): void;

    public function moveDirectory(string $source, string $destination): void;

    public function renameFile(string $source, string $destination): void;

    public function renameDirectory(string $source, string $destination): void;

    public function exists(): Bool_;

    public function isFile(): Bool_;

    public function isDirectory(): Bool_;

    public function isNotEmpty(): Bool_;

    public function isEmpty(): Bool_;

    public function countFiles(): int;

    public function listFiles(): FileCollection;

    public function countDirectories(): int;

    public function listDirectories(): FileCollection;

    public function isReadable(): Bool_;

    public function isWritable(): Bool_;

    public function isExecutable(): Bool_;

    public function isLink(): Bool_;
}
