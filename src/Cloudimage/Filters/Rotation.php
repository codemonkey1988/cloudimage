<?php
declare(strict_types=1);

namespace Codemonkey1988\Cloudimage\Filters;

use Codemonkey1988\Cloudimage\Filters\Exceptions\InvalidNumberException;

/**
 * Class Rotation
 *
 * @licence https://opensource.org/licenses/GPL-3.0 GPL-3.0-or-later
 */
class Rotation implements FilterInterface
{
    /**
     * @var int
     */
    protected $rotate;

    /**
     * Rotation constructor.
     *
     * @param int $rotate
     * @throws InvalidNumberException
     */
    public function __construct(int $rotate)
    {
        if ($rotate < 1 || $rotate > 360) {
            throw new InvalidNumberException('The given rotate need to be between 1 and 360', 1536003485);
        }

        $this->rotate = $rotate;
    }

    /**
     * @return string
     */
    public function build(): string
    {
        return 'r' . $this->rotate;
    }
}
