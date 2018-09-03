<?php
declare(strict_types=1);

namespace Codemonkey1988\Cloudimage\Filters;

use Codemonkey1988\Cloudimage\Filters\Exceptions\InvalidNumberException;

/**
 * Class Trim
 *
 * @licence https://opensource.org/licenses/GPL-3.0 GPL-3.0-or-later
 */
class Trim implements FilterInterface
{
    /**
     * @var int
     */
    protected $trim;

    /**
     * Trim constructor.
     *
     * @param int $trim
     * @throws InvalidNumberException
     */
    public function __construct(int $trim)
    {
        if ($trim < 0 || $trim > 100) {
            throw new InvalidNumberException('The given trim need to be between 0 and 100', 1536003344);
        }

        $this->trim = $trim;
    }

    /**
     * @return string
     */
    public function build(): string
    {
        return 'ftrim' . $this->trim;
    }
}
