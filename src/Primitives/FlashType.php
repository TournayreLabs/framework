<?php

declare(strict_types=1);

namespace TournayreLabs\Primitives;

enum FlashType: string
{
    /** @api */
    case SUCCESS = 'success';

    /** @api */
    case WARNING = 'warning';

    /** @api */
    case ERROR = 'danger';

    /** @api */
    case INFO = 'info';
}
