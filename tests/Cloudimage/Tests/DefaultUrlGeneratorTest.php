<?php
declare(strict_types=1);

namespace Codemonkey1988\Cloudimage\Tests;

use Codemonkey1988\Cloudimage\DefaultUriGenerator;
use Codemonkey1988\Cloudimage\Filters\Quality;
use Codemonkey1988\Cloudimage\Filters\Rotation;
use Codemonkey1988\Cloudimage\Operations\Cdn;
use Codemonkey1988\Cloudimage\Operations\Crop;
use Codemonkey1988\Cloudimage\Operations\Width;
use Codemonkey1988\Cloudimage\Watermark\Dynamic;
use PHPUnit\Framework\TestCase;

final class DefaultUrlGeneratorTest extends TestCase
{
    protected $image = 'http://www.example.tld/my-image.jpg';
    protected $token = '123456789';

    public function testBuildCdnUri()
    {
        $operation = new Cdn();
        $subject = new DefaultUriGenerator($operation, $this->token);
        $url = '//' . $this->token . '.cloudimg.io/cdn/n/n/' . $this->image;

        $this->assertSame($url, $subject->buildUri($this->image));
    }

    public function testBuildWidthUri()
    {
        $operation = new Width();
        $operation->setSize('640');

        $subject = new DefaultUriGenerator($operation, $this->token);
        $url = '//' . $this->token . '.cloudimg.io/width/640/n/' . $this->image;

        $this->assertSame($url, $subject->buildUri($this->image));
    }

    public function testBuildCropUri()
    {
        $operation = new Crop();
        $operation->setSize('640x480');

        $subject = new DefaultUriGenerator($operation, $this->token);
        $url = '//' . $this->token . '.cloudimg.io/crop/640x480/n/' . $this->image;

        $this->assertSame($url, $subject->buildUri($this->image));
    }

    public function testBuildCropUriWidthQualityFilter()
    {
        $qualityFilter = new Quality(90);

        $operation = new Crop();
        $operation->setSize('640x480');
        $operation->addFilter($qualityFilter);

        $subject = new DefaultUriGenerator($operation, $this->token);
        $url = '//' . $this->token . '.cloudimg.io/crop/640x480/q90/' . $this->image;

        $this->assertSame($url, $subject->buildUri($this->image));
    }

    public function testBuildCropUriWidthQualityFilterAndRotationFilter()
    {
        $qualityFilter = new Quality(50);
        $rotationFilter = new Rotation(90);

        $operation = new Crop();
        $operation->setSize('640x480');
        $operation->addFilter($qualityFilter);
        $operation->addFilter($rotationFilter);

        $subject = new DefaultUriGenerator($operation, $this->token);
        $url = '//' . $this->token . '.cloudimg.io/crop/640x480/q50.r90/' . $this->image;

        $this->assertSame($url, $subject->buildUri($this->image));
    }

    public function testBuildCdnUriWithWatermark()
    {
        $watermark = new Dynamic('https://example.tld/image.jpg', 200, 100);
        $watermark->setOpacity(50);
        $operation = new Cdn();
        $operation->setWatermark($watermark);
        $subject = new DefaultUriGenerator($operation, $this->token);
        $url = '//' .
            $this->token .
            '.cloudimg.io/cdn/n/n/' .
            $this->image .
            '?mark_url=' . urlencode('https://example.tld/image.jpg') .
            '&mark_width=200&mark_height=100&mark_alpha=50';

        $this->assertSame($url, $subject->buildUri($this->image));
    }
}
