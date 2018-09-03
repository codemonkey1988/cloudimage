<?php
declare(strict_types=1);

namespace Codemonkey1988\Cloudimage\Operations;

/**
 * Class Cdno
 *
 * @licence https://opensource.org/licenses/GPL-3.0 GPL-3.0-or-later
 */
class Cdno extends AbstractOperation
{
    const OPERATION = 'cdno';

    /**
     * @inheritdoc
     */
    public function getOperation(): string
    {
        return self::OPERATION;
    }

    /**
     * Always return an empty string because this operation does not allow setting a size.
     *
     * @return string
     */
    public function getSize(): string
    {
        return '';
    }
}
