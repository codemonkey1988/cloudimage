<?php
declare(strict_types=1);

namespace Codemonkey1988\Cloudimage\Operations;

use Codemonkey1988\Cloudimage\Operations\Exceptions\InvalidSizeException;

/**
 * Class CropPx
 *
 * @licence https://opensource.org/licenses/GPL-3.0 GPL-3.0-or-later
 */
class CropPx extends AbstractOperation
{
    const OPERATION = 'crop';

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
