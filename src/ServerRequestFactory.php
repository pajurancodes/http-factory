<?php

namespace PajuranCodes\Http\Message;

use function is_string;
use Psr\Http\Message\{
    UriInterface,
    StreamInterface,
    ServerRequestInterface,
    ServerRequestFactoryInterface,
};
use PajuranCodes\Http\Message\{
    Uri,
    ServerRequest,
    MessageFactory,
};

/**
 * A factory to create a server request.
 * 
 * @author pajurancodes
 */
class ServerRequestFactory extends MessageFactory implements ServerRequestFactoryInterface {

    /**
     * 
     * @param mixed[] $attributes (optional) A list of attributes.
     * @param null|array|object $parsedBody (optional) A list of deserialized body parameters.
     * @param array $queryParams (optional) A list of query string arguments.
     * @param array $uploadedFiles (optional) A list of uploaded files, either already 
     * normalized to a tree of UploadedFileInterface instances, or not yet normalized.
     * @param array $cookieParams (optional) A list of key/value pairs representing cookies.
     */
    public function __construct(
        StreamInterface $body,
        protected readonly array $attributes = [],
        array $headers = [],
        protected null|array|object $parsedBody = null,
        protected array $queryParams = [],
        protected array $uploadedFiles = [],
        protected array $cookieParams = [],
        string $protocolVersion = '1.1'
    ) {
        parent::__construct($body, $headers, $protocolVersion);
    }

    /**
     * @inheritDoc
     */
    public function createServerRequest(
        string $method,
        $uri,
        array $serverParams = []
    ): ServerRequestInterface {
        $this
            ->validateMethod($method)
            ->validateUri($uri)
        ;

        if (is_string($uri)) {
            $uri = new Uri($uri);
        }

        return new ServerRequest(
            $method,
            $uri,
            $this->body,
            $this->attributes,
            $this->headers,
            $serverParams,
            $this->parsedBody,
            $this->queryParams,
            $this->uploadedFiles,
            $this->cookieParams,
            $this->protocolVersion
        );
    }

    /**
     * Validate a HTTP method.
     *
     * @param string $method A HTTP method.
     * @return static
     * @throws \InvalidArgumentException An empty HTTP method.
     */
    private function validateMethod(string $method): static {
        if (empty($method)) {
            throw new \InvalidArgumentException('A HTTP method must be provided.');
        }

        return $this;
    }

    /**
     * Validate a URI.
     *
     * @param UriInterface|string $uri A URI.
     * @return static
     */
    private function validateUri(UriInterface|string $uri): static {
        return $this;
    }

}
