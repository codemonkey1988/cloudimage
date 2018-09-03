<?php
declare(strict_types=1);

namespace Codemonkey1988\Cloudimage\Filters;

use Codemonkey1988\Cloudimage\Filters\Exceptions\InvalidNumberException;

/**
 * Class RoundedCorners
 *
 * @licence https://opensource.org/licenses/GPL-3.0 GPL-3.0-or-later
 */
class RoundedCorners implements FilterInterface
{
    /**
     * @var int
     */
    protected $radius;

    /**
     * RoundedCorners constructor.
     *
     * @param int $radius
     * @throws InvalidNumberException
     */
    public function __construct(int $radius)
    {
        if ($radius < 1 || $radius > 150) {
            throw new InvalidNumberException('The given radius need to be between 1 and 150', 1536003272);
        }

        $this->radius = $radius;
    }

    /**
     * @return string
     */
    public function build(): string
    {
        return 'fradius' . $this->radius;
    }
}
