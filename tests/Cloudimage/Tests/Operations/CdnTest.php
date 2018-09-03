<?php
declare(strict_types=1);

namespace Codemonkey1988\Cloudimage\Tests\Operations;

use Codemonkey1988\Cloudimage\Operations\Cdn;
use PHPUnit\Framework\TestCase;

final class CdnTest extends TestCase
{
    /**
     * @var Cdn
     */
    protected $subject;

    public function setUp()
    {
        $this->subject = new Cdn();
    }

    public function testGetCorrectOperation()
    {
        $this->assertSame('cdn', $this->subject->getOperation());
    }

    public function testGetSizeAndFiltersWithoutInitialization()
    {
        $this->assertSame('', $this->subject->getSize());
        $this->assertSame([], $this->subject->getFilters());
    }

    public function testSettingSizeShouldBeEmpty()
    {
        $this->subject->setSize('640');

        $this->assertSame('', $this->subject->getSize());
    }
}
