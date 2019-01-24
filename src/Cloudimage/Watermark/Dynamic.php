<?php
declare(strict_types=1);

namespace Codemonkey1988\Cloudimage\Watermark;

use Codemonkey1988\Cloudimage\Watermark\Exceptions\InvalidNumberException;
use Codemonkey1988\Cloudimage\Watermark\Exceptions\InvalidPositionException;

/**
 * Class Dynamic
 *
 * @licence https://opensource.org/licenses/GPL-3.0 GPL-3.0-or-later
 */
class Dynamic implements WatermarkInterface
{
    const POSITION_NORTHEAST = 'northeast';
    const POSITION_NORTHWEST = 'northwest';
    const POSITION_SOUTHEAST = 'southeast';
    const POSITION_SOUTHWEST = 'southwest';

    /**
     * @var string
     */
    protected $url;

    /**
     * @var int
     */
    protected $opacity;

    /**
     * @var string
     */
    protected $position;

    /**
     * @var int
     */
    protected $size;

    /**
     * @var int
     */
    protected $padding;

    /**
     * @var int
     */
    protected $height;

    /**
     * @var int
     */
    protected $width;

    /**
     * Dynamic constructor.
     *
     * @param string $url The not urlencoded url to the image that should be used as watermark
     * @param int $width Optional: Width of the watermark image in pixel
     * @param int $height Optional: Height of the watermark image in pixel
     * @throws InvalidNumberException
     */
    public function __construct(string $url, $width = 0, $height = 0)
    {
        $this->url = $url;

        if ($width < 0) {
            throw new InvalidNumberException('The given width need to be greater 0', 1548316476);
        }
        if ($height < 0) {
            throw new InvalidNumberException('The given height need to be greater 0', 1548316502);
        }

        $this->width = $width;
        $this->height = $height;
    }

    /**
     * @param int $opacity
     * @throws InvalidNumberException
     */
    public function setOpacity(int $opacity)
    {
        if ($opacity < 0 || $opacity > 100) {
            throw new InvalidNumberException('The given opacity need to be between 0 and 100', 1548316547);
        }

        $this->opacity = $opacity;
    }

    /**
     * @param string $position
     */
    public function setPosition(string $position)
    {
        $validPositions = [
            self::POSITION_NORTHEAST,
            self::POSITION_NORTHWEST,
            self::POSITION_SOUTHEAST,
            self::POSITION_SOUTHWEST,
        ];

        if (!in_array($position, $validPositions)) {
            throw new InvalidPositionException('The given position "' . $position . '" was not valid. See POSITION_ constants', 1548317907);
        }

        $this->position = $position;
    }

    /**
     * @param int $size
     * @throws InvalidNumberException
     */
    public function setSize(int $size)
    {
        if ($size < 0 || $size > 100) {
            throw new InvalidNumberException('The given size need to be between 0 and 100', 1548316547);
        }

        $this->size = $size;
    }

    /**
     * @param int $padding
     * @throws InvalidNumberException
     */
    public function setPadding(int $padding)
    {
        if ($padding < 0 || $padding > 100) {
            throw new InvalidNumberException('The given padding need to be between 0 and 100', 1548316602);
        }

        $this->padding = $padding;
    }

    /**
     * @return string
     */
    public function build(): string
    {
        $parts = [
            'mark_url=' . urlencode($this->url),
        ];

        if ($this->width) {
            $parts[] = 'mark_width=' . $this->width;
        }
        if ($this->height) {
            $parts[] = 'mark_height=' . $this->height;
        }
        if ($this->opacity) {
            $parts[] = 'mark_alpha=' . $this->opacity;
        }
        if ($this->position) {
            $parts[] = 'mark_pos=' . $this->position;
        }
        if ($this->size) {
            $parts[] = 'mark_size=' . $this->size . 'pp';
        }
        if ($this->padding) {
            $parts[] = 'mark_pad=' . $this->padding;
        }

        return implode('&', $parts);
    }
}
