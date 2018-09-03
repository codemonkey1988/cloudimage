<?php
declare(strict_types=1);

namespace Codemonkey1988\Cloudimage\Filters;

use Codemonkey1988\Cloudimage\Filters\Exceptions\InvalidNumberException;

/**
 * Class Pixelrate
 *
 * @licence https://opensource.org/licenses/GPL-3.0 GPL-3.0-or-later
 */
class Pixelrate implements FilterInterface
{
    /**
     * @var int
     */
    protected $contrast;

    /**
     * Pixelrate constructor.
     *
     * @param int $contrast
     * @throws InvalidNumberException
     */
    public function __construct(int $contrast)
    {
        if ($contrast < 0 || $contrast > 100) {
            throw new InvalidNumberException('The given pixelrate need to be between 0 and 100', 1536002958);
        }

        $this->contrast = $contrast;
    }

    /**
     * @return string
     */
    public function build(): string
    {
        return 'fpixelrate' . $this->contrast;
    }
}
