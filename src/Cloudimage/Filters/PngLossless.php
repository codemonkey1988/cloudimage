<?php
declare(strict_types=1);

namespace Codemonkey1988\Cloudimage\Filters;

/**
 * Class PngLossless
 *
 * @licence https://opensource.org/licenses/GPL-3.0 GPL-3.0-or-later
 */
class PngLossless implements FilterInterface
{
    /**
     * @return string
     */
    public function build(): string
    {
        return 'png-lossless';
    }
}
