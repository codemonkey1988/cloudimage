<?php
declare(strict_types=1);
namespace Codemonkey1988\Cloudimage\Operations;

use Codemonkey1988\Cloudimage\Filters\FilterInterface;
use Codemonkey1988\Cloudimage\Watermark\WatermarkInterface;

/**
 * Class AbstractOperation
 *
 * @licence https://opensource.org/licenses/GPL-3.0 GPL-3.0-or-later
 */
abstract class AbstractOperation implements OperationInterface
{
    /**
     * @var string
     */
    private $size ;

    /**
     * @var array
     */
    private $filters;

    /**
     * @var WatermarkInterface
     */
    private $watermark;

    /**
     * AbstractOperation constructor.
     */
    public function __construct()
    {
        $this->size = '';
        $this->filters = [];
    }

    /**
     * @inheritdoc
     */
    public function getSize(): string
    {
        return $this->size;
    }

    /**
     * @inheritdoc
     */
    public function setSize(string $size)
    {
        $this->size = $size;
    }

    /**
     * @inheritdoc
     */
    public function getFilters(): array
    {
        return $this->filters;
    }

    /**
     * @inheritdoc
     */
    public function setFilters(array $filters)
    {
        foreach ($filters as $filter) {
            if ($filter instanceof FilterInterface) {
                $this->addFilter($filter);
            }
        }
    }

    /**
     * @inheritdoc
     */
    public function addFilter(FilterInterface $filter)
    {
        $className = get_class($filter);

        if (!isset($this->filters[$className])) {
            $this->filters[$className] = $filter;
        }
    }

    /**
     * @inheritdoc
     */
    public function removeFilterByClass(string $className)
    {
        if (isset($this->filters[$className])) {
            unset($this->filters[$className]);
        }
    }

    /**
     * @return bool
     */
    public function hasWatermark(): bool
    {
        return $this->watermark !== null;
    }

    /**
     * @return WatermarkInterface
     */
    public function getWatermark(): WatermarkInterface
    {
        return $this->watermark;
    }

    /**
     * @param WatermarkInterface $watermark
     */
    public function setWatermark(WatermarkInterface $watermark)
    {
        $this->watermark = $watermark;
    }
}
