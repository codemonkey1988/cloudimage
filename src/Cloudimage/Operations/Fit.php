<?php
declare(strict_types=1);

namespace Codemonkey1988\Cloudimage\Operations;

use Codemonkey1988\Cloudimage\Operations\Exceptions\InvalidSizeException;
use Codemonkey1988\Cloudimage\Filters\Color;

/**
 * Class Fit
 *
 * @licence https://opensource.org/licenses/GPL-3.0 GPL-3.0-or-later
 */
class Fit extends AbstractOperation
{
    const OPERATION = 'fit';

    /**
     * Fit constructor.
     *
     * @param string $backgroundColor The background color for filling up the image in hex code.
     * @throws \Codemonkey1988\Cloudimage\Filters\Exceptions\InvalidColorCodeException
     */
    public function __construct(string $backgroundColor)
    {
        parent::__construct();

        $backgroundColorFilter = new Color($backgroundColor);

        $this->addFilter($backgroundColorFilter);
    }

    /**
     * @inheritdoc
     */
    public function getOperation(): string
    {
        return self::OPERATION;
    }

    /**
     * @param string $size
     * @throws InvalidSizeException
     */
    public function setSize(string $size)
    {
        if (!preg_match('/^[1-9]\d*x[1-9]\d*$/', $size)) {
            throw new InvalidSizeException('Argument $size must follow the format "123x456".', 1536000170);
        }

        parent::setSize($size);
    }
}
