<?php

declare(strict_types=1);

namespace TournayreLabs\Tests\Unit\Common\Exception;

use PHPUnit\Framework\TestCase;
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
        yield 'BadFunctionCallLoggableException' => [\TournayreLabs\Common\Exception\Loggable\BadFunctionCallLoggableException::class, \BadFunctionCallException::class];
        yield 'BadMethodCallLoggableException' => [\TournayreLabs\Common\Exception\Loggable\BadMethodCallLoggableException::class, \BadMethodCallException::class];
        yield 'DomainLoggableException' => [\TournayreLabs\Common\Exception\Loggable\DomainLoggableException::class, \DomainException::class];
        yield 'InvalidArgumentLoggableException' => [\TournayreLabs\Common\Exception\Loggable\InvalidArgumentLoggableException::class, \InvalidArgumentException::class];
        yield 'LengthLoggableException' => [\TournayreLabs\Common\Exception\Loggable\LengthLoggableException::class, \LengthException::class];
        yield 'LogicLoggableException' => [\TournayreLabs\Common\Exception\Loggable\LogicLoggableException::class, \LogicException::class];
        yield 'OutOfBoundsLoggableException' => [\TournayreLabs\Common\Exception\Loggable\OutOfBoundsLoggableException::class, \OutOfBoundsException::class];
        yield 'OutOfRangeLoggableException' => [\TournayreLabs\Common\Exception\Loggable\OutOfRangeLoggableException::class, \OutOfRangeException::class];
        yield 'OverflowLoggableException' => [\TournayreLabs\Common\Exception\Loggable\OverflowLoggableException::class, \OverflowException::class];
        yield 'RangeLoggableException' => [\TournayreLabs\Common\Exception\Loggable\RangeLoggableException::class, \RangeException::class];
        yield 'RuntimeLoggableException' => [\TournayreLabs\Common\Exception\Loggable\RuntimeLoggableException::class, \RuntimeException::class];
        yield 'UnderflowLoggableException' => [\TournayreLabs\Common\Exception\Loggable\UnderflowLoggableException::class, \UnderflowException::class];
        yield 'UnexpectedValueLoggableException' => [\TournayreLabs\Common\Exception\Loggable\UnexpectedValueLoggableException::class, \UnexpectedValueException::class];
    }
}
