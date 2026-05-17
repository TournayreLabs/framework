<?php

declare(strict_types=1);

namespace TournayreLabs\Tests\Unit\Common\Exception;

use PHPUnit\Framework\TestCase;
use TournayreLabs\Common\Exception\Loggable\RuntimeLoggableException;
use TournayreLabs\Contracts\Log\LoggerInterface;

final class LoggableExceptionTest extends TestCase
{
    public function testThrowLogsExceptionBeforeThrowingIt(): void
    {
        $logger = $this->createMock(LoggerInterface::class);
        $exception = RuntimeLoggableException::new($logger, 'Failure', 42, ['id' => 'abc']);

        $logger
            ->expects(self::once())
            ->method('exception')
            ->with($exception, ['id' => 'abc'])
        ;

        $this->expectExceptionObject($exception);

        $exception->throw();
    }
}
