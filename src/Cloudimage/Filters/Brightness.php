<?php
declare(strict_types=1);

namespace Codemonkey1988\Cloudimage\Filters;

use Codemonkey1988\Cloudimage\Filters\Exceptions\InvalidNumberException;

/**
 * Class Brightness
 *
 * @licence https://opensource.org/licenses/GPL-3.0 GPL-3.0-or-later
 */
class Brightness implements FilterInterface
{
    /**
     * @var int
     */
    protected $brightness;

    /**
     * Brightness constructor.
     *
     * @param int $brightness
     * @throws InvalidNumberException
     */
    public function __construct(int $brightness)
    {
        if ($brightness < 0 || $brightness > 255) {
            throw new InvalidNumberException('The given brightness need to be between 0 and 255', 1536002711);
        }

        $this->brightness = $brightness;
    }

    /**
     * @return string
     */
    public function build(): string
    {
        return 'fbright' . $this->brightness;
    }
}
