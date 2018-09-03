<?php
declare(strict_types=1);

namespace Codemonkey1988\Cloudimage\Tests\Filters;

use Codemonkey1988\Cloudimage\Filters\Color;
use Codemonkey1988\Cloudimage\Filters\Exceptions\InvalidColorCodeException;
use PHPUnit\Framework\TestCase;

final class ColorTest extends TestCase
{
    public function testCreateSubject()
    {
        $subject = new Color('3498db');

        $this->assertTrue(true);
    }

    public function testCreateSubjectWithInvalidColorNoHex()
    {
        $this->expectException(InvalidColorCodeException::class);

        $subject = new Color('3498dh');
    }

    public function testCreateSubjectWithInvalidColorToShort()
    {
        $this->expectException(InvalidColorCodeException::class);

        $subject = new Color('3498d');
    }

    public function testBuildFilterString()
    {
        $subject = new Color('3498db');

        $this->assertSame('c3498db', $subject->build());
    }
}
