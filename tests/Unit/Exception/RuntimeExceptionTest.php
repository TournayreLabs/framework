<?php

declare(strict_types=1);

namespace TournayreLabs\Tests\Unit\Exception;

use PHPUnit\Framework\TestCase;
use TournayreLabs\Common\Exception\RuntimeException;
use TournayreLabs\Contracts\Exception\ThrowableInterface;

final class RuntimeExceptionTest extends TestCase
{
    public function testNew(): void
    {
        $exception = RuntimeException::new('Test message', 123);
        self::assertInstanceOf(RuntimeException::class, $exception); // @phpstan-ignore-line
        self::assertSame('Test message', $exception->getMessage());
        self::assertSame(123, $exception->getCode());
    }

    public function testFromThrowable(): void
    {
        $previous = new \Exception('Previous exception', 456);
        $exception = RuntimeException::fromThrowable($previous);
        self::assertInstanceOf(RuntimeException::class, $exception); // @phpstan-ignore-line
        self::assertSame('Previous exception', $exception->getMessage());
        self::assertSame(456, $exception->getCode());
        self::assertSame($previous, $exception->getPrevious());
    }

    public function testWithPrevious(): void
    {
        $previous = new \Exception('Previous exception');
        $exception = RuntimeException::new('Test message')->withPrevious($previous);
        self::assertInstanceOf(RuntimeException::class, $exception); // @phpstan-ignore-line
        self::assertSame('Test message', $exception->getMessage());
        self::assertSame($previous, $exception->getPrevious());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testThrow(): void
    {
        $this->expectException(RuntimeException::class);
        $exception = RuntimeException::new('Test message');
        $exception->throw();
    }

    public function testIsInstanceOfCoreRuntimeException(): void
    {
        $exception = RuntimeException::new('Test message');
        self::assertInstanceOf(\RuntimeException::class, $exception); // @phpstan-ignore-line
    }

    public function testThrowDoesNotAcceptLogger(): void
    {
        $exception = RuntimeException::new('Test message');
        $this->expectException(RuntimeException::class);
        $exception->throw();
    }
}
