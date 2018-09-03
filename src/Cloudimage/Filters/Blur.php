<?php
declare(strict_types=1);

namespace Codemonkey1988\Cloudimage\Filters;

use Codemonkey1988\Cloudimage\Filters\Exceptions\InvalidNumberException;

/**
 * Class Blur
 *
 * @licence https://opensource.org/licenses/GPL-3.0 GPL-3.0-or-later
 */
class Blur implements FilterInterface
{
    /**
     * @var int
     */
    protected $blur;

    /**
     * Blur constructor.
     *
     * @param int $blur
     * @throws InvalidNumberException
     */
    public function __construct(int $blur)
    {
        if ($blur < 0 || $blur > 100) {
            throw new InvalidNumberException('The given blur need to be between 0 and 100', 1536003043);
        }

        $this->blur = $blur;
    }

    /**
     * @return string
     */
    public function build(): string
    {
        return 'fgaussian' . $this->blur;
    }
}
