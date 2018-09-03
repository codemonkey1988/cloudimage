<?php
declare(strict_types=1);

namespace Codemonkey1988\Cloudimage\Tests\Filters;

use Codemonkey1988\Cloudimage\Filters\Twebp;
use PHPUnit\Framework\TestCase;

final class TwebpTest extends TestCase
{
    public function testBuildFilterString()
    {
        $subject = new Twebp();

        $this->assertSame('twebp', $subject->build());
    }
}
