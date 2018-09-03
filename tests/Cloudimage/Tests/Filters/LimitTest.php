<?php
declare(strict_types=1);

namespace Codemonkey1988\Cloudimage\Tests\Filters;

use Codemonkey1988\Cloudimage\Filters\Limit;
use PHPUnit\Framework\TestCase;

final class LimitTest extends TestCase
{
    public function testBuildFilterString()
    {
        $subject = new Limit();

        $this->assertSame('foil1', $subject->build());
    }
}
