<?php
declare(strict_types=1);

namespace Codemonkey1988\Cloudimage\Factory;

use Codemonkey1988\Cloudimage\Operations\OperationInterface;

class SignatureUriFactory extends AbstractFactory
{
    /**
     * @var string
     */
    protected $salt;

    /**
     * SignatureUriFactory constructor.
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
        $signature = sha1($this->salt . $this->buildUriSegmentsFromOperation($originalImage));
        $path = sprintf(
            '/%s/%s/%s%s/%s',
            $this->getOperation(),
            $this->getSize(),
            $this->getFilters(),
            '@' . $signature,
            $originalImage
        );

        return sprintf(
            '%s/%s',
            rtrim($this->baseUrl, '/'),
            ltrim($path, '/')
        );
    }
}
