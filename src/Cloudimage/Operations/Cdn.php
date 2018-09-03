<?php
declare(strict_types=1);

namespace Codemonkey1988\Cloudimage\Operations;

/**
 * Class Cdn
 *
 * @licence https://opensource.org/licenses/GPL-3.0 GPL-3.0-or-later
 */
class Cdn extends AbstractOperation
{
    const OPERATION = 'cdn';

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

    /**
     * Always return an empty array because this operation does not allow setting any filters.
     *
     * @return array
     */
    public function getFilters(): array
    {
        return [];
    }
}
