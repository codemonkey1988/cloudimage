<?php
declare(strict_types=1);

namespace Codemonkey1988\Cloudimage\Factory;

use Codemonkey1988\Cloudimage\Filters\FilterInterface;
use Codemonkey1988\Cloudimage\Operations\OperationInterface;

abstract class AbstractFactory implements FactoryInterface
{
    /**
     * @var OperationInterface
     */
    protected $operation;

    /**
     * @var string
     */
    protected $baseUrl;

    /**
     * @inheritdoc
     */
    public function __construct(OperationInterface $operation, string $token)
    {
        $this->operation = $operation;
        $this->baseUrl = $this->buildBaseUrl($token);
    }

    /**
     * @param string $originalImage
     * @return string
     */
    protected function buildUriSegmentsFromOperation(string $originalImage): string
    {
        return sprintf(
            '/%s/%s/%s/%s',
            $this->getOperation(),
            $this->getSize(),
            $this->getFilters(),
            $originalImage
        );
    }

    /**
     * @return string
     */
    protected function getOperation(): string
    {
        return trim($this->operation->getOperation(), '/');
    }

    /**
     * @return string
     */
    protected function getSize(): string
    {
        $size = trim($this->operation->getSize(), '/');

        return empty($size) ? 'n' : $size;
    }

    /**
     * @return string
     */
    protected function getFilters(): string
    {
        $filters = [];

        /** @var FilterInterface $filter */
        foreach ($this->operation->getFilters() as $filter) {
            $filters[] = $filter->build();
        }

        return empty($filters) ? 'n' : implode('.', $filters);
    }

    /**
     * @param string $token
     * @return string
     */
    protected function buildBaseUrl(string $token): string
    {
        return sprintf('//%s.cloudimg.io', $token);
    }
}
