<?php

declare(strict_types=1);

namespace TournayreLabs\Contracts\Routing;

enum ReferenceType: int
{
    /** @api Generates an absolute URL, e.g. "http://example.com/dir/file". */
    case ABSOLUTE_URL = 0;

    /** @api Generates an absolute path, e.g. "/dir/file". */
    case ABSOLUTE_PATH = 1;

    /** @api Generates a relative path based on the current request path, e.g. "../parent-file". */
    case RELATIVE_PATH = 2;

    /** @api Generates a network path, e.g. "//example.com/dir/file". Such reference reuses the current scheme but specifies the host. */
    case NETWORK_PATH = 3;
}
