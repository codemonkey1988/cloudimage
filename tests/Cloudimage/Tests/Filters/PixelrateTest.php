<?php
declare(strict_types=1);

namespace Codemonkey1988\Cloudimage\Tests\Filters;

use Codemonkey1988\Cloudimage\Filters\Pixelrate;
use Codemonkey1988\Cloudimage\Filters\Exceptions\InvalidNumberException;
use PHPUnit\Framework\TestCase;

final class PixelrateTest extends TestCase
{
    public function testCreateSubject()
    {
        $subject = new Pixelrate(50);

        $this->assertTrue(true);
    }

    public function testCreateSubjectWithInvalidColorNoHex()
    {
        $this->expectException(InvalidNumberException::class);

        $subject = new Pixelrate(-1);
    }

    public function testCreateSubjectWithInvalidColorToShort()
    {
        $this->expectException(InvalidNumberException::class);

        $subject = new Pixelrate(101);
    }

    public function testBuildFilterString()
    {
        $subject = new Pixelrate(50);

        $this->assertSame('fpixelrate50', $subject->build());
    }
}
