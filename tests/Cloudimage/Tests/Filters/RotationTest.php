<?php
declare(strict_types=1);

namespace Codemonkey1988\Cloudimage\Tests\Filters;

use Codemonkey1988\Cloudimage\Filters\Rotation;
use Codemonkey1988\Cloudimage\Filters\Exceptions\InvalidNumberException;
use PHPUnit\Framework\TestCase;

final class RotationTest extends TestCase
{
    public function testCreateSubject()
    {
        $subject = new Rotation(90);

        $this->assertTrue(true);
    }

    public function testCreateSubjectWithFallBehindLowerValue()
    {
        $this->expectException(InvalidNumberException::class);

        $subject = new Rotation(0);
    }

    public function testCreateSubjectWithExceedingUpperValue()
    {
        $this->expectException(InvalidNumberException::class);

        $subject = new Rotation(361);
    }

    public function testBuildFilterString()
    {
        $subject = new Rotation(90);

        $this->assertSame('r90', $subject->build());
    }
}
