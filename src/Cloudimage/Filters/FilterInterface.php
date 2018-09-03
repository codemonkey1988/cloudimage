<?php
declare(strict_types=1);

namespace Codemonkey1988\Cloudimage\Filters;

interface FilterInterface
{
    /**
     * Build a string that is used for the url.
     *
     * @return string
     */
    public function build(): string;
}
