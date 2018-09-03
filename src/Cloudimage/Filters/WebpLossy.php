<?php
declare(strict_types=1);

namespace Codemonkey1988\Cloudimage\Filters;

use Codemonkey1988\Cloudimage\Filters\Exceptions\InvalidNumberException;

/**
 * Class WebpLossy
 *
 * @licence https://opensource.org/licenses/GPL-3.0 GPL-3.0-or-later
 */
class WebpLossy implements FilterInterface
{
    /**
     * @var int
     */
    protected $quality;

    /**
     * WebpLossy constructor.
     *
     * @param int $quality
     * @throws InvalidNumberException
     */
    public function __construct(int $quality)
    {
        if ($quality < 1 || $quality > 100) {
            throw new InvalidNumberException('The given quality need to be between 1 and 100', 1536002958);
        }

        $this->quality = $quality;
    }

    /**
     * @return string
     */
    public function build(): string
    {
        return 'webp-lossy-' . $this->quality;
    }
}
