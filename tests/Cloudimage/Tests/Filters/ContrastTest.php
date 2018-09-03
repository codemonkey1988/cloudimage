<?php
declare(strict_types=1);

namespace Codemonkey1988\Cloudimage\Tests\Filters;

use Codemonkey1988\Cloudimage\Filters\Contrast;
use Codemonkey1988\Cloudimage\Filters\Exceptions\InvalidNumberException;
use PHPUnit\Framework\TestCase;

final class ContrastTest extends TestCase
{
    public function testCreateSubject()
    {
        $subject = new Contrast(50);

        $this->assertTrue(true);
    }

    public function testCreateSubjectWithFallBehindLowerValue()
    {
        $this->expectException(InvalidNumberException::class);

        $subject = new Contrast(-1);
    }

    public function testCreateSubjectWithExceedingUpperValue()
    {
        $this->expectException(InvalidNumberException::class);

        $subject = new Contrast(101);
    }

    public function testBuildFilterString()
    {
        $subject = new Contrast(50);

        $this->assertSame('fcontrast50', $subject->build());
    }
}
