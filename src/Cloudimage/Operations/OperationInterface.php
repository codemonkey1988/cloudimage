<?php
declare(strict_types=1);
namespace Codemonkey1988\Cloudimage\Operations;

use Codemonkey1988\Cloudimage\Filters\FilterInterface;

interface OperationInterface
{
    /**
     * Return the name of the current operation.
     *
     * @return string
     */
    public function getOperation(): string;

    /**
     * Get the size for the current operation.
     *
     * @return string
     */
    public function getSize(): string;

    /**
     * Set the size for the current operation.
     *
     * @param string $size
     */
    public function setSize(string $size);

    /**
     * Get all filters.
     *
     * @return array
     */
    public function getFilters(): array;

    /**
     * Set all filters that should be used with this operation.
     *
     * @param array $filters
     */
    public function setFilters(array $filters);

    /**
     * Adds a filter to the operation.
     *
     * @param FilterInterface $filter
     */
    public function addFilter(FilterInterface $filter);

    /**
     * Removes a filter from the used filters for this operation.
     *
     * @param string $className
     */
    public function removeFilterByClass(string $className);
}
