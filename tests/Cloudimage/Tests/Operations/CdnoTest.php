<?php
declare(strict_types=1);

namespace Codemonkey1988\Cloudimage\Tests\Operations;

use Codemonkey1988\Cloudimage\Operations\Cdno;
use PHPUnit\Framework\TestCase;

final class CdnoTest extends TestCase
{
    /**
     * @var Cdno
     */
    protected $subject;

    public function setUp()
    {
        $this->subject = new Cdno();
    }

    public function testGetCorrectOperation()
    {
        $this->assertSame('cdno', $this->subject->getOperation());
    }

    public function testSettingSizeShouldBeEmpty()
    {
        $this->subject->setSize('640');

        $this->assertSame('', $this->subject->getSize());
    }
}
