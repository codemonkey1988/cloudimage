<?php
declare(strict_types=1);

namespace Codemonkey1988\Cloudimage\Tests\Filters;

use Codemonkey1988\Cloudimage\Filters\Greyscale;
use PHPUnit\Framework\TestCase;

final class GreyscaleTest extends TestCase
{
    public function testBuildFilterString()
    {
        $subject = new Greyscale();

        $this->assertSame('fgrey', $subject->build());
    }
}
