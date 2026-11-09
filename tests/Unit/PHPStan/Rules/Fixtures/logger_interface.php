<?php

declare(strict_types=1);

namespace TournayreLabs\Tests\Unit\PHPStan\Rules\Fixtures;

use Psr\Log\LoggerInterface;
use TournayreLabs\Contracts\Log\LoggerInterface as TournayreLabsLoggerInterface;

function psr(LoggerInterface $logger): void
{
}

function framework(TournayreLabsLoggerInterface $logger): void
{
}
