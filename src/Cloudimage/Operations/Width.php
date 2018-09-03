<?php
declare(strict_types=1);

namespace Codemonkey1988\Cloudimage\Operations;

use Codemonkey1988\Cloudimage\Operations\Exceptions\InvalidSizeException;

/**
 * Class Width
 *
 * @licence https://opensource.org/licenses/GPL-3.0 GPL-3.0-or-later
 */
class Width extends AbstractOperation
{
    const OPERATION = 'width';

    /**
     * @inheritdoc
     */
    public function getOperation(): string
    {
        return self::OPERATION;
    }

    /**
     * @param string $size
     */
    public function setSize(string $size)
    {
        if (!is_numeric($size)) {
            throw new InvalidSizeException('Argument $size must be numeric', 1535999629);
        }

        parent::setSize($size);
    }
}
