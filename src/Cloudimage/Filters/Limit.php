<?php
declare(strict_types=1);

namespace Codemonkey1988\Cloudimage\Filters;

/**
 * Class Limit
 *
 * @licence https://opensource.org/licenses/GPL-3.0 GPL-3.0-or-later
 */
class Limit implements FilterInterface
{
    /**
     * @return string
     */
    public function build(): string
    {
        return 'foil1';
    }
}
