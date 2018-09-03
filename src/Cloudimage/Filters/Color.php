<?php
declare(strict_types=1);

namespace Codemonkey1988\Cloudimage\Filters;

use Codemonkey1988\Cloudimage\Filters\Exceptions\InvalidColorCodeException;

/**
 * Class Color
 *
 * @licence https://opensource.org/licenses/GPL-3.0 GPL-3.0-or-later
 */
class Color implements FilterInterface
{
    /**
     * @var string
     */
    protected $backgroundColor;

    /**
     * Color constructor.
     *
     * @param string $backgroundColor
     * @throws InvalidColorCodeException
     */
    public function __construct(string $backgroundColor)
    {
        $backgroundColor = strtolower($backgroundColor);

        if (!preg_match('/^[0-9a-f]{6}$/', $backgroundColor)) {
            throw new InvalidColorCodeException('The given color must be in hexadecimal code.', 1536001433);
        }

        $this->backgroundColor = $backgroundColor;
    }

    /**
     * @return string
     */
    public function build(): string
    {
        return 'c' . $this->backgroundColor;
    }
}
