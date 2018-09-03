<?php
declare(strict_types=1);

namespace Codemonkey1988\Cloudimage\Tests\Filters;

use Codemonkey1988\Cloudimage\Filters\WebpLossy;
use Codemonkey1988\Cloudimage\Filters\Exceptions\InvalidNumberException;
use PHPUnit\Framework\TestCase;

final class WebpLossyTest extends TestCase
{
    public function testCreateSubject()
    {
        $subject = new WebpLossy(50);

        $this->assertTrue(true);
    }

    public function testCreateSubjectWithFallBehindLowerValue()
    {
        $this->expectException(InvalidNumberException::class);

        $subject = new WebpLossy(-1);
    }

    public function testCreateSubjectWithExceedingUpperValue()
    {
        $this->expectException(InvalidNumberException::class);

        $subject = new WebpLossy(101);
    }

    public function testBuildFilterString()
    {
        $subject = new WebpLossy(50);

        $this->assertSame('webp-lossy-50', $subject->build());
    }
}
