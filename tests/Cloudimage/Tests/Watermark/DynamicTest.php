<?php
declare(strict_types=1);

namespace Codemonkey1988\Cloudimage\Tests\Watermark;

use Codemonkey1988\Cloudimage\Watermark\Dynamic;
use PHPUnit\Framework\TestCase;

final class BrightnessTest extends TestCase
{
    /**
     * @throws \Codemonkey1988\Cloudimage\Watermark\Exceptions\InvalidNumberException
     */
    public function testCreateSubjectWithUrl()
    {
        $subject = new Dynamic('http://example.tld/image.jpg');

        $this->assertTrue(true);
    }

    /**
     * @throws \Codemonkey1988\Cloudimage\Watermark\Exceptions\InvalidNumberException
     */
    public function testCreateSubjectWithUrlAndWidth()
    {
        $subject = new Dynamic('http://example.tld/image.jpg', 100);

        $this->assertTrue(true);
    }

    /**
     * @throws \Codemonkey1988\Cloudimage\Watermark\Exceptions\InvalidNumberException
     */
    public function testCreateSubjectWithUrlAndWidthAndHeight()
    {
        $subject = new Dynamic('http://example.tld/image.jpg', 100, 100);

        $this->assertTrue(true);
    }

    /**
     * @throws \Codemonkey1988\Cloudimage\Watermark\Exceptions\InvalidNumberException
     */
    public function testCreateSubjectWithUrlAndInvalidWidth()
    {
        $this->expectExceptionCode(1548316476);
        $subject = new Dynamic('http://example.tld/image.jpg', -3);
    }

    /**
     * @throws \Codemonkey1988\Cloudimage\Watermark\Exceptions\InvalidNumberException
     */
    public function testCreateSubjectWithUrlAndInvalidHeight()
    {
        $this->expectExceptionCode(1548316502);
        $subject = new Dynamic('http://example.tld/image.jpg', 100, -3);
    }

    /**
     * @throws \Codemonkey1988\Cloudimage\Watermark\Exceptions\InvalidNumberException
     */
    public function testBuildWithUrl()
    {
        $subject = new Dynamic('http://example.tld/image.jpg');
        $expected = 'mark_url=' . urlencode('http://example.tld/image.jpg');

        $this->assertSame($expected, $subject->build());
    }

    /**
     * @throws \Codemonkey1988\Cloudimage\Watermark\Exceptions\InvalidNumberException
     */
    public function testBuildWithUrlWidthAndHeight()
    {
        $subject = new Dynamic('http://example.tld/image.jpg', 100, 100);
        $expected = 'mark_url=' . urlencode('http://example.tld/image.jpg') . '&mark_width=100&mark_height=100';

        $this->assertSame($expected, $subject->build());
    }

    /**
     * @throws \Codemonkey1988\Cloudimage\Watermark\Exceptions\InvalidNumberException
     */
    public function testBuildWithUrlAndOpacity()
    {
        $subject = new Dynamic('http://example.tld/image.jpg');
        $subject->setOpacity(50);
        $expected = 'mark_url=' . urlencode('http://example.tld/image.jpg') . '&mark_alpha=50';

        $this->assertSame($expected, $subject->build());
    }

    public function buildWithUrlAndInvalidOpacityDataProvider()
    {
        return [
            [
                'opacity' => -3,
            ],
            [
                'opacity' => 110,
            ],
        ];
    }

    /**
     * @param int $opacity
     * @throws \Codemonkey1988\Cloudimage\Watermark\Exceptions\InvalidNumberException
     * @dataProvider buildWithUrlAndInvalidOpacityDataProvider
     */
    public function testBuildWithUrlAndInvalidOpacity(int $opacity)
    {
        $this->expectExceptionCode(1548316547);
        $subject = new Dynamic('http://example.tld/image.jpg');
        $subject->setOpacity($opacity);
    }

    public function buildWithUrlAndPositionDataProvider()
    {
        return [
            [
                'position' => Dynamic::POSITION_NORTHEAST,
            ],
            [
                'position' => Dynamic::POSITION_NORTHWEST,
            ],
            [
                'position' => Dynamic::POSITION_SOUTHEAST,
            ],
            [
                'position' => Dynamic::POSITION_SOUTHWEST,
            ],
        ];
    }

    /**
     * @param string $position
     * @throws \Codemonkey1988\Cloudimage\Watermark\Exceptions\InvalidNumberException
     * @throws \Codemonkey1988\Cloudimage\Watermark\Exceptions\InvalidPositionException
     * @dataProvider buildWithUrlAndPositionDataProvider
     */
    public function testBuildWithUrlAndPosition(string $position)
    {
        $subject = new Dynamic('http://example.tld/image.jpg');
        $subject->setPosition($position);
        $expected = 'mark_url=' . urlencode('http://example.tld/image.jpg') . '&mark_pos=' . $position;

        $this->assertSame($expected, $subject->build());
    }

    /**
     * @throws \Codemonkey1988\Cloudimage\Watermark\Exceptions\InvalidNumberException
     * @throws \Codemonkey1988\Cloudimage\Watermark\Exceptions\InvalidPositionException
     */
    public function testBuildWithUrlAndInvalidPosition()
    {
        $this->expectExceptionCode(1548317907);
        $subject = new Dynamic('http://example.tld/image.jpg');
        $subject->setPosition('myownposition');
    }

    /**
     * @throws \Codemonkey1988\Cloudimage\Watermark\Exceptions\InvalidNumberException
     */
    public function testBuildWithUrlAndSize()
    {
        $subject = new Dynamic('http://example.tld/image.jpg');
        $subject->setSize(65);
        $expected = 'mark_url=' . urlencode('http://example.tld/image.jpg') . '&mark_size=65pp';

        $this->assertSame($expected, $subject->build());
    }

    public function buildWithUrlAndInvalidSizeDataProvider()
    {
        return [
            [
                'size' => -3,
            ],
            [
                'size' => 110,
            ],
        ];
    }

    /**
     * @param int $size
     * @throws \Codemonkey1988\Cloudimage\Watermark\Exceptions\InvalidNumberException
     * @dataProvider buildWithUrlAndInvalidSizeDataProvider
     */
    public function testBuildWithUrlAndInvalidSize(int $size)
    {
        $this->expectExceptionCode(1548316547);
        $subject = new Dynamic('http://example.tld/image.jpg');
        $subject->setSize($size);
    }

    /**
     * @throws \Codemonkey1988\Cloudimage\Watermark\Exceptions\InvalidNumberException
     */
    public function testBuildWithUrlAndPadding()
    {
        $subject = new Dynamic('http://example.tld/image.jpg');
        $subject->setPadding(10);
        $expected = 'mark_url=' . urlencode('http://example.tld/image.jpg') . '&mark_pad=10';

        $this->assertSame($expected, $subject->build());
    }

    public function buildWithUrlAndInvalidPaddingDataProvider()
    {
        return [
            [
                'padding' => -3,
            ],
            [
                'padding' => 110,
            ],
        ];
    }

    /**
     * @param int $padding
     * @throws \Codemonkey1988\Cloudimage\Watermark\Exceptions\InvalidNumberException
     * @dataProvider buildWithUrlAndInvalidPaddingDataProvider
     */
    public function testBuildWithUrlAndInvalidPadding(int $padding)
    {
        $this->expectExceptionCode(1548316602);
        $subject = new Dynamic('http://example.tld/image.jpg');
        $subject->setPadding($padding);
    }

    /**
     * @throws \Codemonkey1988\Cloudimage\Watermark\Exceptions\InvalidNumberException
     * @throws \Codemonkey1988\Cloudimage\Watermark\Exceptions\InvalidPositionException
     */
    public function testBuildWithAllParameters()
    {
        $subject = new Dynamic('http://example.tld/image.jpg', 200, 100);
        $subject->setOpacity(50);
        $subject->setPosition(Dynamic::POSITION_SOUTHWEST);
        $subject->setSize(40);
        $subject->setPadding(10);

        $expected = '' .
            'mark_url=' . urlencode('http://example.tld/image.jpg') .
            '&mark_width=200' .
            '&mark_height=100' .
            '&mark_alpha=50' .
            '&mark_pos=southwest' .
            '&mark_size=40pp' .
            '&mark_pad=10';

        $this->assertSame($expected, $subject->build());
    }
}
