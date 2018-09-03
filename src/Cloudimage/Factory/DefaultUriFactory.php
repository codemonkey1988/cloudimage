<?php
declare(strict_types=1);

namespace Codemonkey1988\Cloudimage\Factory;

class DefaultUriFactory extends AbstractFactory
{
    /**
     * @inheritdoc
     */
    public function buildUri(string $originalImage): string
    {
        return sprintf(
            '%s/%s',
            rtrim($this->baseUrl, '/'),
            ltrim($this->buildUriSegmentsFromOperation($originalImage), '/')
        );
    }
}
