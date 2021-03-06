<?php
declare(strict_types=1);

namespace Codemonkey1988\Cloudimage\Tests\Filters;

use Codemonkey1988\Cloudimage\Filters\Webp;
use PHPUnit\Framework\TestCase;

final class WebpTest extends TestCase
{
    public function testBuildFilterString()
    {
        $subject = new Webp();

        $this->assertSame('webp', $subject->build());
    }
}
