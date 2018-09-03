<?php
declare(strict_types=1);

namespace Codemonkey1988\Cloudimage\Filters;

use Codemonkey1988\Cloudimage\Filters\Exceptions\InvalidNumberException;

/**
 * Class Sharpen
 *
 * @licence https://opensource.org/licenses/GPL-3.0 GPL-3.0-or-later
 */
class Sharpen implements FilterInterface
{
    /**
     * @var int
     */
    protected $sharp;

    /**
     * Sharpen constructor.
     *
     * @param int $sharp
     * @throws InvalidNumberException
     */
    public function __construct(int $sharp)
    {
        if ($sharp < 0 || $sharp > 4) {
            throw new InvalidNumberException('The given sharpening need to be between 0 and 4', 1536003268);
        }

        $this->sharp = $sharp;
    }

    /**
     * @return string
     */
    public function build(): string
    {
        return 'fsharp' . $this->sharp;
    }
}
