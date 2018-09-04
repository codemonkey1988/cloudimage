<?php
declare(strict_types=1);

namespace Codemonkey1988\Cloudimage\Tests;

use Codemonkey1988\Cloudimage\SignatureUriGenerator;
use Codemonkey1988\Cloudimage\Filters\Quality;
use Codemonkey1988\Cloudimage\Filters\Rotation;
use Codemonkey1988\Cloudimage\Operations\Cdn;
use Codemonkey1988\Cloudimage\Operations\Crop;
use Codemonkey1988\Cloudimage\Operations\Width;
use PHPUnit\Framework\TestCase;

final class SignatureUrlGeneratorTest extends TestCase
{
    protected $image = 'http://www.example.tld/my-image.jpg';
    protected $token = '123456789';
    protected $salt = 'abcdefgh';

    public function testBuildCdnUri()
    {
        $operation = new Cdn();
        $subject = new SignatureUriGenerator($operation, $this->token, $this->salt);
        $url = '//' . $this->token . '.cloudimg.io/cdn/n/n@921317a9b00dc0b5a29e6b32a832361db582fd70/' . $this->image;

        $this->assertSame($url, $subject->buildUri($this->image));
    }

    public function testBuildWidthUri()
    {
        $operation = new Width();
        $operation->setSize('640');

        $subject = new SignatureUriGenerator($operation, $this->token, $this->salt);
        $url = '//' . $this->token . '.cloudimg.io/width/640/n@58c34876a7ce6684d578903c0d420c5448bdd6be/' . $this->image;

        $this->assertSame($url, $subject->buildUri($this->image));
    }

    public function testBuildCropUri()
    {
        $operation = new Crop();
        $operation->setSize('640x480');

        $subject = new SignatureUriGenerator($operation, $this->token, $this->salt);
        $url = '//' . $this->token . '.cloudimg.io/crop/640x480/n@1de46813fe762fe2fbf799b318dc3e48280839ad/' . $this->image;

        $this->assertSame($url, $subject->buildUri($this->image));
    }

    public function testBuildCropUriWidthQualityFilter()
    {
        $qualityFilter = new Quality(90);

        $operation = new Crop();
        $operation->setSize('640x480');
        $operation->addFilter($qualityFilter);

        $subject = new SignatureUriGenerator($operation, $this->token, $this->salt);
        $url = '//' . $this->token . '.cloudimg.io/crop/640x480/q90@b273a6a4ac61062f47f600a028223ca1119f6e5d/' . $this->image;

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

        $subject = new SignatureUriGenerator($operation, $this->token, $this->salt);
        $url = '//' . $this->token . '.cloudimg.io/crop/640x480/q50.r90@19cb88863ff0ac5185773ffcec9b0cf522b367b5/' . $this->image;

        $this->assertSame($url, $subject->buildUri($this->image));
    }
}
