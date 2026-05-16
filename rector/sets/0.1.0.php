<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Renaming\Rector\ClassConstFetch\RenameClassConstFetchRector;
use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\ValueObject\MethodCallRename;
use Rector\Renaming\ValueObject\RenameClassConstFetch;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->ruleWithConfiguration(RenameMethodRector::class, [
        // AbstractLogger::getLoggerIdentifier() → loggerIdentifier() (EO: no getters)
        new MethodCallRename('TournayreLabs\Common\Log\AbstractLogger', 'getLoggerIdentifier', 'loggerIdentifier'),
        // AbstractLogger::setLoggerIdentifier() → identifiedAs() (EO: no setters)
        new MethodCallRename('TournayreLabs\Common\Log\AbstractLogger', 'setLoggerIdentifier', 'identifiedAs'),
        // LoggerInterface::setLoggerIdentifier() → identifiedAs() (EO: no setters)
        new MethodCallRename('TournayreLabs\Contracts\Log\LoggerInterface', 'setLoggerIdentifier', 'identifiedAs'),
    ]);

    $rectorConfig->ruleWithConfiguration(RenameClassConstFetchRector::class, [
        // FlashBagInterface constants → FlashType enum cases (EO: no public constants)
        new RenameClassConstFetch('TournayreLabs\Contracts\Session\FlashBagInterface', 'SUCCESS', 'TournayreLabs\Primitives\FlashType', 'SUCCESS'),
        new RenameClassConstFetch('TournayreLabs\Contracts\Session\FlashBagInterface', 'WARNING', 'TournayreLabs\Primitives\FlashType', 'WARNING'),
        new RenameClassConstFetch('TournayreLabs\Contracts\Session\FlashBagInterface', 'ERROR', 'TournayreLabs\Primitives\FlashType', 'ERROR'),
        new RenameClassConstFetch('TournayreLabs\Contracts\Session\FlashBagInterface', 'INFO', 'TournayreLabs\Primitives\FlashType', 'INFO'),
        // RoutingInterface constants → ReferenceType enum cases (EO: no public constants)
        new RenameClassConstFetch('TournayreLabs\Contracts\Routing\RoutingInterface', 'ABSOLUTE_URL', 'TournayreLabs\Contracts\Routing\ReferenceType', 'ABSOLUTE_URL'),
        new RenameClassConstFetch('TournayreLabs\Contracts\Routing\RoutingInterface', 'ABSOLUTE_PATH', 'TournayreLabs\Contracts\Routing\ReferenceType', 'ABSOLUTE_PATH'),
        new RenameClassConstFetch('TournayreLabs\Contracts\Routing\RoutingInterface', 'RELATIVE_PATH', 'TournayreLabs\Contracts\Routing\ReferenceType', 'RELATIVE_PATH'),
        new RenameClassConstFetch('TournayreLabs\Contracts\Routing\RoutingInterface', 'NETWORK_PATH', 'TournayreLabs\Contracts\Routing\ReferenceType', 'NETWORK_PATH'),
    ]);
};
