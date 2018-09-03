<?php
declare(strict_types=1);

namespace Codemonkey1988\Cloudimage\Tests\Filters;

use Codemonkey1988\Cloudimage\Filters\Trim;
use Codemonkey1988\Cloudimage\Filters\Exceptions\InvalidNumberException;
use PHPUnit\Framework\TestCase;

final class TrimTest extends TestCase
{
    public function testCreateSubject()
    {
        $subject = new Trim(50);

        $this->assertTrue(true);
    }

    public function testCreateSubjectWithFallBehindLowerValue()
    {
        $this->expectException(InvalidNumberException::class);

        $subject = new Trim(-1);
    }

    public function testCreateSubjectWithExceedingUpperValue()
    {
        $this->expectException(InvalidNumberException::class);

        $subject = new Trim(101);
    }

    public function testBuildFilterString()
    {
        $subject = new Trim(50);

        $this->assertSame('ftrim50', $subject->build());
    }
}
