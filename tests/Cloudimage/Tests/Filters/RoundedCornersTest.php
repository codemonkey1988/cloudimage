<?php
declare(strict_types=1);

namespace Codemonkey1988\Cloudimage\Tests\Filters;

use Codemonkey1988\Cloudimage\Filters\RoundedCorners;
use Codemonkey1988\Cloudimage\Filters\Exceptions\InvalidNumberException;
use PHPUnit\Framework\TestCase;

final class RoundedCornersTest extends TestCase
{
    public function testCreateSubject()
    {
        $subject = new RoundedCorners(50);

        $this->assertTrue(true);
    }

    public function testCreateSubjectWithFallBehindLowerValue()
    {
        $this->expectException(InvalidNumberException::class);

        $subject = new RoundedCorners(0);
    }

    public function testCreateSubjectWithExceedingUpperValue()
    {
        $this->expectException(InvalidNumberException::class);

        $subject = new RoundedCorners(151);
    }

    public function testBuildFilterString()
    {
        $subject = new RoundedCorners(50);

        $this->assertSame('fradius50', $subject->build());
    }
}
