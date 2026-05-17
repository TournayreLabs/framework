<?php

declare(strict_types=1);

use Rector\CodeQuality\Rector\FunctionLike\SimplifyUselessVariableRector;
use Rector\Config\RectorConfig;
use Rector\DeadCode\Rector\Array_\RemoveDuplicatedArrayKeyRector;
use Rector\DeadCode\Rector\Assign\RemoveDoubleAssignRector;
use Rector\DeadCode\Rector\BooleanAnd\RemoveAndTrueRector;
use Rector\DeadCode\Rector\Cast\RecastingRemovalRector;
use Rector\DeadCode\Rector\ClassMethod\RemoveUselessParamTagRector;
use Rector\DeadCode\Rector\ClassMethod\RemoveUselessReturnExprInConstructRector;
use Rector\DeadCode\Rector\ClassMethod\RemoveUselessReturnTagRector;
use Rector\DeadCode\Rector\Concat\RemoveConcatAutocastRector;
use Rector\DeadCode\Rector\ConstFetch\RemovePhpVersionIdCheckRector;
use Rector\DeadCode\Rector\Expression\RemoveDeadStmtRector;
use Rector\DeadCode\Rector\Expression\SimplifyMirrorAssignRector;
use Rector\DeadCode\Rector\For_\RemoveDeadContinueRector;
use Rector\DeadCode\Rector\For_\RemoveDeadIfForeachForRector;
use Rector\DeadCode\Rector\For_\RemoveDeadLoopRector;
use Rector\DeadCode\Rector\Foreach_\RemoveUnusedForeachKeyRector;
use Rector\DeadCode\Rector\If_\RemoveDeadInstanceOfRector;
use Rector\DeadCode\Rector\If_\RemoveTypedPropertyDeadInstanceOfRector;
use Rector\DeadCode\Rector\If_\RemoveUnusedNonEmptyArrayBeforeForeachRector;
use Rector\DeadCode\Rector\If_\SimplifyIfElseWithSameContentRector;
use Rector\DeadCode\Rector\If_\UnwrapFutureCompatibleIfPhpVersionRector;
use Rector\DeadCode\Rector\Node\RemoveNonExistingVarAnnotationRector;
use Rector\DeadCode\Rector\Plus\RemoveDeadZeroAndOneOperationRector;
use Rector\DeadCode\Rector\Property\RemoveUselessReadOnlyTagRector;
use Rector\DeadCode\Rector\Property\RemoveUselessVarTagRector;
use Rector\DeadCode\Rector\Return_\RemoveDeadConditionAboveReturnRector;
use Rector\DeadCode\Rector\StaticCall\RemoveParentCallWithoutParentRector;
use Rector\DeadCode\Rector\Switch_\RemoveDuplicatedCaseInSwitchRector;
use Rector\DeadCode\Rector\Ternary\TernaryToBooleanOrFalseToBooleanAndRector;
use Rector\DeadCode\Rector\TryCatch\RemoveDeadTryCatchRector;
use Rector\Set\ValueObject\SetList;
use Rector\Symfony\Set\SymfonySetList;

return RectorConfig::configure()
    ->withPaths([
        __DIR__.'/../src',
        __DIR__.'/../tests',
    ])
    ->withRootFiles()
    ->withPhpSets(
        php82: true,
    )
    ->withSets([
        SetList::EARLY_RETURN,
        SetList::PRIVATIZATION,
        SymfonySetList::SYMFONY_CODE_QUALITY,
    ])
    ->withImportNames(
        importShortClasses: false,
        removeUnusedImports: true,
    )
    ->withRules([
        RemoveUnusedForeachKeyRector::class,
        RemoveDuplicatedArrayKeyRector::class,
        RecastingRemovalRector::class,
        RemoveAndTrueRector::class,
        SimplifyMirrorAssignRector::class,
        RemoveDeadContinueRector::class,
        RemoveUnusedNonEmptyArrayBeforeForeachRector::class,
        RemoveUselessReturnExprInConstructRector::class,
        RemoveTypedPropertyDeadInstanceOfRector::class,
        TernaryToBooleanOrFalseToBooleanAndRector::class,
        RemoveDoubleAssignRector::class,
        RemoveConcatAutocastRector::class,
        SimplifyIfElseWithSameContentRector::class,
        SimplifyUselessVariableRector::class,
        RemoveDeadZeroAndOneOperationRector::class,
        RemoveUselessParamTagRector::class,
        RemoveUselessReturnTagRector::class,
        RemoveUselessReadOnlyTagRector::class,
        RemoveNonExistingVarAnnotationRector::class,
        RemoveUselessVarTagRector::class,
        RemovePhpVersionIdCheckRector::class,
        RemoveDuplicatedCaseInSwitchRector::class,
        RemoveDeadInstanceOfRector::class,
        RemoveDeadTryCatchRector::class,
        RemoveDeadIfForeachForRector::class,
        RemoveDeadStmtRector::class,
        UnwrapFutureCompatibleIfPhpVersionRector::class,
        RemoveParentCallWithoutParentRector::class,
        RemoveDeadConditionAboveReturnRector::class,
        RemoveDeadLoopRector::class,
    ])
;
