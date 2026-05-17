<?php

declare(strict_types=1);

namespace TournayreLabs\Tests\Unit\Exception;

use PHPUnit\Framework\TestCase;
use TournayreLabs\Common\Exception\BadFunctionCallException;
use TournayreLabs\Common\Exception\BadMethodCallException;
use TournayreLabs\Common\Exception\DomainException;
use TournayreLabs\Common\Exception\InvalidArgumentException;
use TournayreLabs\Common\Exception\LengthException;
use TournayreLabs\Common\Exception\LogicException;
use TournayreLabs\Common\Exception\OutOfBoundsException;
use TournayreLabs\Common\Exception\OutOfRangeException;
use TournayreLabs\Common\Exception\OverflowException;
use TournayreLabs\Common\Exception\RangeException;
use TournayreLabs\Common\Exception\RuntimeException;
use TournayreLabs\Common\Exception\UnderflowException;
use TournayreLabs\Common\Exception\UnexpectedValueException;
use TournayreLabs\Contracts\Exception\ThrowableFactoryInterface;

final class BuiltInExceptionMappingTest extends TestCase
{
    /**
     * @dataProvider frameworkExceptionsProvider
     *
     * @param class-string $frameworkClass
     * @param class-string $phpClass
     */
    public function testFrameworkExceptionsMapBuiltInExceptions(string $frameworkClass, string $phpClass): void
    {
        self::assertTrue(is_a($frameworkClass, $phpClass, true));
        self::assertTrue(is_a($frameworkClass, ThrowableFactoryInterface::class, true));

        $exception = $frameworkClass::new('Test message', 7);

        self::assertSame('Test message', $exception->getMessage());
        self::assertSame(7, $exception->getCode());
    }

    /**
     * @return iterable<string, array{class-string, class-string}>
     */
    public static function frameworkExceptionsProvider(): iterable
    {
        yield 'BadFunctionCallException' => [BadFunctionCallException::class, \BadFunctionCallException::class];
        yield 'BadMethodCallException' => [BadMethodCallException::class, \BadMethodCallException::class];
        yield 'DomainException' => [DomainException::class, \DomainException::class];
        yield 'InvalidArgumentException' => [InvalidArgumentException::class, \InvalidArgumentException::class];
        yield 'LengthException' => [LengthException::class, \LengthException::class];
        yield 'LogicException' => [LogicException::class, \LogicException::class];
        yield 'OutOfBoundsException' => [OutOfBoundsException::class, \OutOfBoundsException::class];
        yield 'OutOfRangeException' => [OutOfRangeException::class, \OutOfRangeException::class];
        yield 'OverflowException' => [OverflowException::class, \OverflowException::class];
        yield 'RangeException' => [RangeException::class, \RangeException::class];
        yield 'RuntimeException' => [RuntimeException::class, \RuntimeException::class];
        yield 'UnderflowException' => [UnderflowException::class, \UnderflowException::class];
        yield 'UnexpectedValueException' => [UnexpectedValueException::class, \UnexpectedValueException::class];
    }
}
