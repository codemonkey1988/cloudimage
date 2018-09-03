<?php
declare(strict_types=1);

namespace Codemonkey1988\Cloudimage\Tests\Operations;

use Codemonkey1988\Cloudimage\Filters\Color;
use Codemonkey1988\Cloudimage\Operations\Exceptions\InvalidSizeException;
use Codemonkey1988\Cloudimage\Operations\Fit;
use PHPUnit\Framework\TestCase;

final class FitTest extends TestCase
{
    /**
     * @var Fit
     */
    protected $subject;

    public function setUp()
    {
        $this->subject = new Fit('3498db');
    }

    public function testGetCorrectOperation()
    {
        $this->assertSame('fit', $this->subject->getOperation());
    }

    public function testGetSizeAndFiltersWithoutInitialization()
    {
        $this->assertSame('', $this->subject->getSize());
        $this->assertCount(1, $this->subject->getFilters());
        $this->assertSame(Color::class, array_keys($this->subject->getFilters())[0]);
    }

    public function testSettingSize()
    {
        $this->subject->setSize('640x480');

        $this->assertSame('640x480', $this->subject->getSize());
    }

    public function testSettingInvalidSizeSingleNumber()
    {
        $this->expectException(InvalidSizeException::class);

        $this->subject->setSize('640');
    }

    public function testSettingInvalidSizeSingleNumberWithX()
    {
        $this->expectException(InvalidSizeException::class);

        $this->subject->setSize('640x');
    }

    public function testSettingInvalidSizeNumberStartWithZero()
    {
        $this->expectException(InvalidSizeException::class);

        $this->subject->setSize('640x060');
    }
}
