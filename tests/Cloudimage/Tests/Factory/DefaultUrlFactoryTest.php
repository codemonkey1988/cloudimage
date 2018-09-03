<?php
declare(strict_types=1);

namespace Codemonkey1988\Cloudimage\Tests\Filters;

use Codemonkey1988\Cloudimage\Factory\DefaultUriFactory;
use Codemonkey1988\Cloudimage\Filters\Quality;
use Codemonkey1988\Cloudimage\Filters\Rotation;
use Codemonkey1988\Cloudimage\Operations\Cdn;
use Codemonkey1988\Cloudimage\Operations\Crop;
use Codemonkey1988\Cloudimage\Operations\Width;
use PHPUnit\Framework\TestCase;

final class DefaultUrlFactoryTest extends TestCase
{
    protected $image = 'http://www.example.tld/my-image.jpg';
    protected $token = '123456789';

    public function testBuildCdnUri()
    {
        $operation = new Cdn();
        $subject = new DefaultUriFactory($operation, $this->token);
        $url = '//' . $this->token . '.cloudimg.io/cdn/n/n/' . $this->image;

        $this->assertSame($url, $subject->buildUri($this->image));
    }

    public function testBuildWidthUri()
    {
        $operation = new Width();
        $operation->setSize('640');

        $subject = new DefaultUriFactory($operation, $this->token);
        $url = '//' . $this->token . '.cloudimg.io/width/640/n/' . $this->image;

        $this->assertSame($url, $subject->buildUri($this->image));
    }

    public function testBuildCropUri()
    {
        $operation = new Crop();
        $operation->setSize('640x480');

        $subject = new DefaultUriFactory($operation, $this->token);
        $url = '//' . $this->token . '.cloudimg.io/crop/640x480/n/' . $this->image;

        $this->assertSame($url, $subject->buildUri($this->image));
    }

    public function testBuildCropUriWidthQualityFilter()
    {
        $qualityFilter = new Quality(90);

        $operation = new Crop();
        $operation->setSize('640x480');
        $operation->addFilter($qualityFilter);

        $subject = new DefaultUriFactory($operation, $this->token);
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

        $subject = new DefaultUriFactory($operation, $this->token);
        $url = '//' . $this->token . '.cloudimg.io/crop/640x480/q50.r90/' . $this->image;

        $this->assertSame($url, $subject->buildUri($this->image));
    }
}
