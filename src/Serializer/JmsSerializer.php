<?php declare(strict_types=1);

namespace Phpro\RestDemo\Serializer;

use Doctrine\Common\Annotations\AnnotationRegistry;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use Psr\Http\Message\ResponseInterface;

class JmsSerializer implements ResponseSerializerInterface
{
    private SerializerInterface $serializer;
    private string $format;

    private function __construct(SerializerInterface $serializer, string $format)
    {
        $this->serializer = $serializer;
        $this->format = $format;
    }

    public static function create(string $autoloader = 'vendor/autoload.php'): self
    {
        // Register annotations
        $loader = require $autoloader;
        /** @var callable $callable */
        $callable = [$loader, 'loadClass'];
        AnnotationRegistry::registerLoader($callable);

        // Create serializer
        $builder = SerializerBuilder::create();
        $builder->setCacheDir(__DIR__ . '/../../var/cache');

        return new self($builder->build(), 'json');
    }

    public function convertResponse(ResponseInterface $response, string $type)
    {
        return $this->serializer->deserialize((string)$response->getBody(), $type, $this->format);
    }
}
