<?php
declare(strict_types=1);

namespace Codemonkey1988\Cloudimage\Tests\Filters;

use Codemonkey1988\Cloudimage\Filters\Blur;
use Codemonkey1988\Cloudimage\Filters\Exceptions\InvalidNumberException;
use PHPUnit\Framework\TestCase;

final class BlurTest extends TestCase
{
    public function testCreateSubject()
    {
        $subject = new Blur(50);

        $this->assertTrue(true);
    }

    public function testCreateSubjectWithFallBehindLowerValue()
    {
        $this->expectException(InvalidNumberException::class);

        $subject = new Blur(-1);
    }

    public function testCreateSubjectWithExceedingUpperValue()
    {
        $this->expectException(InvalidNumberException::class);

        $subject = new Blur(101);
    }

    public function testBuildFilterString()
    {
        $subject = new Blur(50);

        $this->assertSame('fgaussian50', $subject->build());
    }
}
