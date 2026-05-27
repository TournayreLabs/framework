<?php

declare(strict_types=1);

namespace TournayreLabs\Symfony\Filesystem;

use Symfony\Component\Filesystem\Filesystem as SymfonyFilesystem;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo as SymfonySplFileInfo;
use TournayreLabs\Common\Exception\RuntimeException;
use TournayreLabs\Common\Types\DirectoryOrFile;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use TournayreLabs\Contracts\Filesystem\FilesystemInterface;
use TournayreLabs\Primitives\Bool_;
use TournayreLabs\Primitives\Collection;
use TournayreLabs\Primitives\Collection\FileCollection;
use TournayreLabs\Primitives\Mixed_;
use TournayreLabs\Wrapper\SplFileInfo;

final readonly class Filesystem implements FilesystemInterface
{
    private function __construct(
        private DirectoryOrFile $directoryOrFile,
        private Finder $finder,
        private SymfonyFilesystem $filesystem,
    ) {
    }

    public static function from(string $directoryOrFile): self
    {
        return new self(
            directoryOrFile: DirectoryOrFile::of($directoryOrFile),
            finder: new Finder(),
            filesystem: new SymfonyFilesystem(),
        );
    }

    public function createDirectory(string $directory): void
    {
        $directoryToCreate = $this->concatWithDirectoryOrFile($directory);

        $this
            ->filesystem
            ->mkdir($directoryToCreate)
        ;
    }

    private function concatWithDirectoryOrFile(string $directoryOrFile): string
    {
        return $this->directoryOrFile
            ->prefixWith($directoryOrFile)
            ->toString()
        ;
    }

    public function removeDirectory(string $directory): void
    {
        $directoryToRemove = $this->concatWithDirectoryOrFile($directory);

        $this
            ->filesystem
            ->remove($directoryToRemove)
        ;
    }

    public function removeFile(string $file): void
    {
        $fileToRemove = $this->concatWithDirectoryOrFile($file);

        $this
            ->filesystem
            ->remove($fileToRemove)
        ;
    }

    public function createFile(string $file, string $content): void
    {
        $file = $this->directoryOrFile
            ->prefixWith($file)
            ->toString()
        ;

        $this
            ->filesystem
            ->dumpFile($file, $content)
        ;
    }

    public function copyFile(string $source, string $destination): void
    {
        $source = $this->directoryOrFile
            ->prefixWith($source)
            ->toString()
        ;

        $destination = $this->directoryOrFile
            ->prefixWith($destination)
            ->toString()
        ;

        $this
            ->filesystem
            ->copy($source, $destination)
        ;
    }

    public function copyDirectory(string $source, string $destination): void
    {
        $source = $this->directoryOrFile
            ->prefixWith($source)
            ->toString()
        ;

        $destination = $this->directoryOrFile
            ->prefixWith($destination)
            ->toString()
        ;

        $this
            ->filesystem
            ->mirror($source, $destination)
        ;
    }

    public function moveFile(string $source, string $destination): void
    {
        $source = $this->directoryOrFile
            ->prefixWith($source)
            ->toString()
        ;

        $destination = $this->directoryOrFile
            ->prefixWith($destination)
            ->toString()
        ;

        $this
            ->filesystem
            ->rename($source, $destination)
        ;
    }

    public function moveDirectory(string $source, string $destination): void
    {
        $this->moveFile($source, $destination);
    }

    public function renameFile(string $source, string $destination): void
    {
        $this->moveFile($source, $destination);
    }

    public function renameDirectory(string $source, string $destination): void
    {
        $this->moveFile($source, $destination);
    }

    public function exists(): Bool_
    {
        $exists = $this
            ->filesystem
            ->exists($this->directoryOrFile->toString())
        ;

        return Bool_::fromBool($exists);
    }

    public function isFile(): Bool_
    {
        $filename = $this->directoryOrFile->toString();
        $isFile = \is_file($filename);

        return Bool_::fromBool($isFile);
    }

    public function isDirectory(): Bool_
    {
        $filename = $this->directoryOrFile->toString();
        $isDir = \is_dir($filename);

        return Bool_::fromBool($isDir);
    }

    /**
     * @throws ThrowableInterface
     */
    public function isNotEmpty(): Bool_
    {
        $isNotEmpty = $this->isEmpty()
            ->no()
        ;

        return Bool_::fromBool($isNotEmpty);
    }

    /**
     * @throws ThrowableInterface
     */
    public function isEmpty(): Bool_
    {
        $isEmpty = $this->listFiles()->hasNoElement()->isTrue()
            && $this->listDirectories()->hasNoElement()->isTrue();

        return Bool_::fromBool($isEmpty);
    }

    /**
     * @throws ThrowableInterface
     */
    public function countFiles(): int
    {
        return $this->listFiles()
            ->count()
            ->value()
        ;
    }

    /**
     * @throws ThrowableInterface
     */
    public function listFiles(): FileCollection
    {
        $finder = $this->finder
            ->files()
            ->in($this->directoryOrFile->toString())
        ;
        $files = $this->fromIteratorToSplFileInfos($finder);
        $files = Collection::of($files)->values()->toArray();
        /** @var array<int, SplFileInfo> $files */

        return FileCollection::asList($files);
    }

    /**
     * @param iterable<int|string, SymfonySplFileInfo> $files
     *
     * @return array<int|string, SplFileInfo>
     */
    private function fromIteratorToSplFileInfos(iterable $files): array
    {
        $arrayFiles = is_array($files) ? $files : iterator_to_array($files, false);
        $splFiles = Collection::of($arrayFiles)
            ->filterWith(static fn (mixed $file): bool => Mixed_::of($file)->is()->instanceOf(SymfonySplFileInfo::class)->isTrue())
            ->map(static function (mixed $file): SplFileInfo {
                if (Mixed_::of($file)->is()->instanceOf(SymfonySplFileInfo::class)->isTrue()) {
                    return SplFileInfo::of($file->getRealPath(), $file->getRelativePath(), $file->getRelativePathname());
                }
                throw RuntimeException::new('Expected SymfonySplFileInfo after filter');
            })
            ->toArray()
        ;

        /** @var array<int|string, SplFileInfo> $splFiles */

        return $splFiles;
    }

    /**
     * @throws ThrowableInterface
     */
    public function countDirectories(): int
    {
        return $this->listDirectories()
            ->count()
            ->value()
        ;
    }

    /**
     * @throws ThrowableInterface
     */
    public function listDirectories(): FileCollection
    {
        $finder = $this->finder
            ->directories()
            ->in($this->directoryOrFile->toString())
        ;
        $files = $this->fromIteratorToSplFileInfos($finder);
        $files = Collection::of($files)->values()->toArray();
        /** @var array<int, SplFileInfo> $files */

        return FileCollection::asList($files);
    }

    public function isReadable(): Bool_
    {
        $filename = $this->directoryOrFile->toString();
        $isReadable = \is_readable($filename);

        return Bool_::fromBool($isReadable);
    }

    public function isWritable(): Bool_
    {
        $filename = $this->directoryOrFile->toString();
        $isWritable = \is_writable($filename);

        return Bool_::fromBool($isWritable);
    }

    public function isExecutable(): Bool_
    {
        $filename = $this->directoryOrFile->toString();
        $isExecutable = \is_executable($filename);

        return Bool_::fromBool($isExecutable);
    }

    public function isLink(): Bool_
    {
        $filename = $this->directoryOrFile->toString();
        $isLink = \is_link($filename);

        return Bool_::fromBool($isLink);
    }
}
