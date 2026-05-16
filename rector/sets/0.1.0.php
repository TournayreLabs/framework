<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\ValueObject\MethodCallRename;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->ruleWithConfiguration(RenameMethodRector::class, [
        // AbstractLogger::getLoggerIdentifier() → loggerIdentifier() (EO: no getters)
        new MethodCallRename('TournayreLabs\Common\Log\AbstractLogger', 'getLoggerIdentifier', 'loggerIdentifier'),
        // AbstractLogger::setLoggerIdentifier() → identifiedAs() (EO: no setters)
        new MethodCallRename('TournayreLabs\Common\Log\AbstractLogger', 'setLoggerIdentifier', 'identifiedAs'),
        // LoggerInterface::setLoggerIdentifier() → identifiedAs() (EO: no setters)
        new MethodCallRename('TournayreLabs\Contracts\Log\LoggerInterface', 'setLoggerIdentifier', 'identifiedAs'),
    ]);
};
