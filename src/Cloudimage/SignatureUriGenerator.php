<?php
declare(strict_types=1);

namespace Codemonkey1988\Cloudimage;

use Codemonkey1988\Cloudimage\Operations\OperationInterface;

class SignatureUriGenerator extends DefaultUriGenerator
{
    /**
     * @var string
     */
    protected $salt;

    /**
     * SignatureUriFactory constructor.
     *
     * @param OperationInterface $operation
     * @param string $token
     * @param string $salt
     */
    public function __construct(OperationInterface $operation, string $token, string $salt)
    {
        parent::__construct($operation, $token);

        $this->salt = $salt;
    }

    /**
     * @inheritdoc
     */
    public function buildUri(string $originalImage): string
    {
        $path = sprintf(
            '/%s/%s/%s%s/%s%s',
            $this->getOperation(),
            $this->getSize(),
            $this->getFilters(),
            '@' . $this->buildSignatureHash($originalImage),
            $originalImage,
            $this->buildQueryString()
        );

        return sprintf(
            '%s/%s',
            rtrim($this->baseUrl, '/'),
            ltrim($path, '/')
        );
    }

    /**
     * @param string $originalImage
     * @return string
     */
    protected function buildSignatureHash(string $originalImage): string
    {
        return sha1($this->salt . sprintf(
            '/%s/%s/%s/%s',
            $this->getOperation(),
            $this->getSize(),
            $this->getFilters(),
            $originalImage
        ));
    }
}
