<?php

declare(strict_types=1);

namespace TournayreLabs\Tests\Unit\Common\Exception;

use PHPUnit\Framework\TestCase;
use TournayreLabs\Common\Exception\Loggable\BadFunctionCallLoggableException;
use TournayreLabs\Common\Exception\Loggable\BadMethodCallLoggableException;
use TournayreLabs\Common\Exception\Loggable\DomainLoggableException;
use TournayreLabs\Common\Exception\Loggable\InvalidArgumentLoggableException;
use TournayreLabs\Common\Exception\Loggable\LengthLoggableException;
use TournayreLabs\Common\Exception\Loggable\LogicLoggableException;
use TournayreLabs\Common\Exception\Loggable\OutOfBoundsLoggableException;
use TournayreLabs\Common\Exception\Loggable\OutOfRangeLoggableException;
use TournayreLabs\Common\Exception\Loggable\OverflowLoggableException;
use TournayreLabs\Common\Exception\Loggable\RangeLoggableException;
use TournayreLabs\Common\Exception\Loggable\RuntimeLoggableException;
use TournayreLabs\Common\Exception\Loggable\UnderflowLoggableException;
use TournayreLabs\Common\Exception\Loggable\UnexpectedValueLoggableException;
use TournayreLabs\Contracts\Exception\LoggableThrowableFactoryInterface;
use TournayreLabs\Contracts\Log\LoggerInterface;

final class LoggableBuiltInExceptionMappingTest extends TestCase
{
    /**
     * @dataProvider loggableExceptionsProvider
     *
     * @param class-string $frameworkClass
     * @param class-string $phpClass
     */
    public function testLoggableExceptionsMapBuiltInExceptions(string $frameworkClass, string $phpClass): void
    {
        self::assertTrue(is_a($frameworkClass, $phpClass, true));
        self::assertTrue(is_a($frameworkClass, LoggableThrowableFactoryInterface::class, true));

        $logger = $this->createMock(LoggerInterface::class);
        $exception = $frameworkClass::new($logger, 'Test message', 7, ['key' => 'value']);

        self::assertSame('Test message', $exception->getMessage());
        self::assertSame(7, $exception->getCode());
    }

    /**
     * @return iterable<string, array{class-string, class-string}>
     */
    public static function loggableExceptionsProvider(): iterable
    {
        yield 'BadFunctionCallLoggableException' => [BadFunctionCallLoggableException::class, \BadFunctionCallException::class];
        yield 'BadMethodCallLoggableException' => [BadMethodCallLoggableException::class, \BadMethodCallException::class];
        yield 'DomainLoggableException' => [DomainLoggableException::class, \DomainException::class];
        yield 'InvalidArgumentLoggableException' => [InvalidArgumentLoggableException::class, \InvalidArgumentException::class];
        yield 'LengthLoggableException' => [LengthLoggableException::class, \LengthException::class];
        yield 'LogicLoggableException' => [LogicLoggableException::class, \LogicException::class];
        yield 'OutOfBoundsLoggableException' => [OutOfBoundsLoggableException::class, \OutOfBoundsException::class];
        yield 'OutOfRangeLoggableException' => [OutOfRangeLoggableException::class, \OutOfRangeException::class];
        yield 'OverflowLoggableException' => [OverflowLoggableException::class, \OverflowException::class];
        yield 'RangeLoggableException' => [RangeLoggableException::class, \RangeException::class];
        yield 'RuntimeLoggableException' => [RuntimeLoggableException::class, \RuntimeException::class];
        yield 'UnderflowLoggableException' => [UnderflowLoggableException::class, \UnderflowException::class];
        yield 'UnexpectedValueLoggableException' => [UnexpectedValueLoggableException::class, \UnexpectedValueException::class];
    }
}
