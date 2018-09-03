<?php
declare(strict_types=1);

namespace Codemonkey1988\Cloudimage\Factory;

interface FactoryInterface
{
    /**
     * Build the final url for using in the frontend.
     *
     * @param string $originalImage
     * @return string
     */
    public function buildUri(string $originalImage): string;
}
