<?php
declare(strict_types=1);
namespace Codemonkey1988\Cloudimage\Operations;

use Codemonkey1988\Cloudimage\Filters\FilterInterface;
use Codemonkey1988\Cloudimage\Watermark\WatermarkInterface;

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

    /**
     * Does the operation contains a watermark.
     *
     * @return bool
     */
    public function hasWatermark(): bool;

    /**
     * Get the configured watermark.
     * Before calling this method, check with hasWatermark() is there is a watermark.
     *
     * @return WatermarkInterface
     */
    public function getWatermark(): WatermarkInterface;

    /**
     * Set a watermark for this operation.
     *
     * @param WatermarkInterface $watermark
     */
    public function setWatermark(WatermarkInterface $watermark);
}
