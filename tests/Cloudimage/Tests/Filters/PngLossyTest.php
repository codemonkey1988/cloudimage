<?php
declare(strict_types=1);

namespace Codemonkey1988\Cloudimage\Tests\Filters;

use Codemonkey1988\Cloudimage\Filters\PngLossy;
use Codemonkey1988\Cloudimage\Filters\Exceptions\InvalidNumberException;
use PHPUnit\Framework\TestCase;

final class PngLossyTest extends TestCase
{
    public function testCreateSubject()
    {
        $subject = new PngLossy(50);

        $this->assertTrue(true);
    }

    public function testCreateSubjectWithFallBehindLowerValue()
    {
        $this->expectException(InvalidNumberException::class);

        $subject = new PngLossy(-1);
    }

    public function testCreateSubjectWithExceedingUpperValue()
    {
        $this->expectException(InvalidNumberException::class);

        $subject = new PngLossy(101);
    }

    public function testBuildFilterString()
    {
        $subject = new PngLossy(50);

        $this->assertSame('png-lossy-50', $subject->build());
    }
}
