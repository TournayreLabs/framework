<?php

declare(strict_types=1);

require_once __DIR__.'/../Rector/BoolEnumFromBoolToNamedConstructorRector.php';
require_once __DIR__.'/../Rector/StringNormalizeConstFetchToMethodCallRector.php';

use Rector\Config\RectorConfig;
use Rector\Renaming\Rector\ClassConstFetch\RenameClassConstFetchRector;
use Rector\Renaming\Rector\MethodCall\RenameMethodRector;
use Rector\Renaming\Rector\Name\RenameClassRector;
use Rector\Renaming\Rector\StaticCall\RenameStaticMethodRector;
use Rector\Renaming\ValueObject\MethodCallRename;
use Rector\Renaming\ValueObject\RenameClassAndConstFetch;
use Rector\Renaming\ValueObject\RenameStaticMethod;
use TournayreLabs\Rector\BoolEnumFromBoolToNamedConstructorRector;
use TournayreLabs\Rector\StringNormalizeConstFetchToMethodCallRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->rule(BoolEnumFromBoolToNamedConstructorRector::class);
    $rectorConfig->rule(StringNormalizeConstFetchToMethodCallRector::class);

    $rectorConfig->ruleWithConfiguration(RenameClassRector::class, [
        'TournayreLabs\Primitives\BoolEnum' => 'TournayreLabs\Primitives\Bool_',
        'TournayreLabs\Primitives\StringType' => 'TournayreLabs\Primitives\String_',
    ]);

    $rectorConfig->ruleWithConfiguration(RenameStaticMethodRector::class, [
        new RenameStaticMethod('TournayreLabs\Primitives\StringType', 'of', 'TournayreLabs\Primitives\String_', 'fromString'),
        new RenameStaticMethod('TournayreLabs\Primitives\String_', 'of', 'TournayreLabs\Primitives\String_', 'fromString'),
    ]);

    $rectorConfig->ruleWithConfiguration(RenameMethodRector::class, [
        // AbstractLogger::getLoggerIdentifier() → loggerIdentifier() (EO: no getters)
        new MethodCallRename('TournayreLabs\Common\Log\AbstractLogger', 'getLoggerIdentifier', 'loggerIdentifier'),
        // AbstractLogger::setLoggerIdentifier() → identifiedAs() (EO: no setters)
        new MethodCallRename('TournayreLabs\Common\Log\AbstractLogger', 'setLoggerIdentifier', 'identifiedAs'),
        // LoggerInterface::setLoggerIdentifier() → identifiedAs() (EO: no setters)
        new MethodCallRename('TournayreLabs\Contracts\Log\LoggerInterface', 'setLoggerIdentifier', 'identifiedAs'),
        // Manual migrations required (Rector cannot distinguish calls by arg count):
        // - ->throw($logger, $ctx) → ->throwWith($logger, $ctx) [ThrowableInterface]
        // - ->add($value, $callback) → ->addWithCallback($value, $callback) [AddInterface]
        // - ->push($value, $callback) → ->pushWithCallback($value, $callback) [PushInterface]
        // - ->set($key, $value, $callback) → ->setIf($key, $value, $callback) [CollectionCommonTrait]
        // - ->set($key, $value, $callback) → ->setWithCallback($key, $value, $callback) [SetInterface]
        // - ->identifiedAs(null) → ->resetIdentifier() [LoggerInterface]
        // - Ulid::of($string) → Ulid::fromString($string)
        // - DateTime::of($dt, $tz) → DateTime::ofWithTimezone($dt, $tz)
        // - ->slice($start, $length) → ->sliceWithLength($start, $length) [String_]
        // - ->splice($repl, $start, $length) → ->spliceWithLength($repl, $start, $length) [String_]
        // - ->split($delim, $limit, $flags) → ->splitWithLimit($delim, $limit, $flags) [String_]
        // - ->join($strings, $lastGlue) → ->joinWithLastGlue($strings, $lastGlue) [String_] (2-arg form only)
        // - EventCollection::contains($key, $op, $value) → contains(Event $event) [EventCollection]
        // - EmailContactCollection::contains($key, $op, $value) → contains(EmailContact $emailContact)
    ]);

    $rectorConfig->ruleWithConfiguration(RenameClassConstFetchRector::class, [
        // FlashBagInterface constants → FlashType enum cases (EO: no public constants)
        new RenameClassAndConstFetch('TournayreLabs\Contracts\Session\FlashBagInterface', 'SUCCESS', 'TournayreLabs\Primitives\FlashType', 'SUCCESS'),
        new RenameClassAndConstFetch('TournayreLabs\Contracts\Session\FlashBagInterface', 'WARNING', 'TournayreLabs\Primitives\FlashType', 'WARNING'),
        new RenameClassAndConstFetch('TournayreLabs\Contracts\Session\FlashBagInterface', 'ERROR', 'TournayreLabs\Primitives\FlashType', 'ERROR'),
        new RenameClassAndConstFetch('TournayreLabs\Contracts\Session\FlashBagInterface', 'INFO', 'TournayreLabs\Primitives\FlashType', 'INFO'),
        // RoutingInterface constants → ReferenceType enum cases (EO: no public constants)
        new RenameClassAndConstFetch('TournayreLabs\Contracts\Routing\RoutingInterface', 'ABSOLUTE_URL', 'TournayreLabs\Contracts\Routing\ReferenceType', 'ABSOLUTE_URL'),
        new RenameClassAndConstFetch('TournayreLabs\Contracts\Routing\RoutingInterface', 'ABSOLUTE_PATH', 'TournayreLabs\Contracts\Routing\ReferenceType', 'ABSOLUTE_PATH'),
        new RenameClassAndConstFetch('TournayreLabs\Contracts\Routing\RoutingInterface', 'RELATIVE_PATH', 'TournayreLabs\Contracts\Routing\ReferenceType', 'RELATIVE_PATH'),
        new RenameClassAndConstFetch('TournayreLabs\Contracts\Routing\RoutingInterface', 'NETWORK_PATH', 'TournayreLabs\Contracts\Routing\ReferenceType', 'NETWORK_PATH'),
    ]);
};
