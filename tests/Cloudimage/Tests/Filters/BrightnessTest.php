<?php
declare(strict_types=1);

namespace Codemonkey1988\Cloudimage\Tests\Filters;

use Codemonkey1988\Cloudimage\Filters\Brightness;
use Codemonkey1988\Cloudimage\Filters\Exceptions\InvalidNumberException;
use PHPUnit\Framework\TestCase;

final class BrightnessTest extends TestCase
{
    public function testCreateSubject()
    {
        $subject = new Brightness(50);

        $this->assertTrue(true);
    }

    public function testCreateSubjectWithFallBehindLowerValue()
    {
        $this->expectException(InvalidNumberException::class);

        $subject = new Brightness(-1);
    }

    public function testCreateSubjectWithExceedingUpperValue()
    {
        $this->expectException(InvalidNumberException::class);

        $subject = new Brightness(256);
    }

    public function testBuildFilterString()
    {
        $subject = new Brightness(100);

        $this->assertSame('fbright100', $subject->build());
    }
}
