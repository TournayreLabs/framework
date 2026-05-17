<?php

declare(strict_types=1);

namespace TournayreLabs\Traits;

use ArchTech\Enums\Comparable;
use ArchTech\Enums\From;
use ArchTech\Enums\InvokableCases;
use ArchTech\Enums\Metadata;
use ArchTech\Enums\Names;
use ArchTech\Enums\Options;
use ArchTech\Enums\Values;

/**
 * Aggregates ArchTech enum helper traits used across framework enums.
 */
trait EnumTrait
{
    use Comparable;
    use From;
    use InvokableCases;
    use Metadata;
    use Names;
    use Options;
    use Values;
}
