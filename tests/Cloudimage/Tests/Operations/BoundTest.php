<?php
declare(strict_types=1);

namespace Codemonkey1988\Cloudimage\Tests\Operations;

use Codemonkey1988\Cloudimage\Operations\Exceptions\InvalidSizeException;
use Codemonkey1988\Cloudimage\Operations\Bound;
use PHPUnit\Framework\TestCase;

final class BoundTest extends TestCase
{
    /**
     * @var Bound
     */
    protected $subject;

    public function setUp()
    {
        $this->subject = new Bound();
    }

    public function testGetCorrectOperation()
    {
        $this->assertSame('bound', $this->subject->getOperation());
    }

    public function testGetSizeAndFiltersWithoutInitialization()
    {
        $this->assertSame('', $this->subject->getSize());
        $this->assertSame([], $this->subject->getFilters());
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
