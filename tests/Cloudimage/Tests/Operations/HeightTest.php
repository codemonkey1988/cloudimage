<?php
declare(strict_types=1);

namespace Codemonkey1988\Cloudimage\Tests\Operations;

use Codemonkey1988\Cloudimage\Operations\Exceptions\InvalidSizeException;
use Codemonkey1988\Cloudimage\Operations\Height;
use PHPUnit\Framework\TestCase;

final class HeightTest extends TestCase
{
    /**
     * @var Height
     */
    protected $subject;

    public function setUp()
    {
        $this->subject = new Height();
    }

    public function testGetCorrectOperation()
    {
        $this->assertSame('height', $this->subject->getOperation());
    }

    public function testGetSizeAndFiltersWithoutInitialization()
    {
        $this->assertSame('', $this->subject->getSize());
        $this->assertSame([], $this->subject->getFilters());
    }

    public function testSettingSize()
    {
        $this->subject->setSize('640');

        $this->assertSame('640', $this->subject->getSize());
    }

    public function testSettingInvalidSize()
    {
        $this->expectException(InvalidSizeException::class);

        $this->subject->setSize('640c');
    }
}
