<?php

declare(strict_types=1);

namespace TournayreLabs\Tests\Unit\Exception;

use TournayreLabs\Common\Exception\InvalidArgumentException;
use TournayreLabs\Contracts\Exception\ThrowableInterface;
use PHPUnit\Framework\TestCase;

final class InvalidArgumentExceptionTest extends TestCase
{
    public function testNew(): void
    {
        $exception = InvalidArgumentException::new('Test message', 123);
        self::assertInstanceOf(InvalidArgumentException::class, $exception); // @phpstan-ignore-line
        self::assertSame('Test message', $exception->getMessage());
        self::assertSame(123, $exception->getCode());
    }

    public function testFromThrowable(): void
    {
        $previous = new \Exception('Previous exception', 456);
        $exception = InvalidArgumentException::fromThrowable($previous);
        self::assertInstanceOf(InvalidArgumentException::class, $exception); // @phpstan-ignore-line
        self::assertSame('Previous exception', $exception->getMessage());
        self::assertSame(456, $exception->getCode());
        self::assertSame($previous, $exception->getPrevious());
    }

    public function testWithPrevious(): void
    {
        $previous = new \Exception('Previous exception');
        $exception = InvalidArgumentException::new('Test message')->withPrevious($previous);
        self::assertInstanceOf(InvalidArgumentException::class, $exception); // @phpstan-ignore-line
        self::assertSame('Test message', $exception->getMessage());
        self::assertSame($previous, $exception->getPrevious());
    }

    /**
     * @throws ThrowableInterface
     */
    public function testThrow(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $exception = InvalidArgumentException::new('Test message');
        $exception->throw();
    }

    public function testIsInstanceOfCoreInvalidArgumentException(): void
    {
        $exception = InvalidArgumentException::new('Test message');
        self::assertInstanceOf(\InvalidArgumentException::class, $exception); // @phpstan-ignore-line
    }

    public function testThrowDoesNotAcceptLogger(): void
    {
        $exception = InvalidArgumentException::new('Test message');
        $this->expectException(InvalidArgumentException::class);
        $exception->throw();
    }
}
