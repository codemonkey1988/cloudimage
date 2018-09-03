<?php
declare(strict_types=1);

namespace Codemonkey1988\Cloudimage\Tests\Filters;

use Codemonkey1988\Cloudimage\Filters\PngLossless;
use PHPUnit\Framework\TestCase;

final class PngLosslessTest extends TestCase
{
    public function testBuildFilterString()
    {
        $subject = new PngLossless();

        $this->assertSame('png-lossless', $subject->build());
    }
}
