<?php

namespace PajuranCodes\Http\Message;

use function is_string;
use Psr\Http\Message\{
    UriInterface,
    RequestInterface,
    RequestFactoryInterface,
};
use PajuranCodes\Http\Message\{
    Uri,
    Request,
    MessageFactory,
};

/**
 * A factory to create a HTTP request.
 * 
 * @author pajurancodes
 */
class RequestFactory extends MessageFactory implements RequestFactoryInterface {

    /**
     * @inheritDoc
     */
    public function createRequest(string $method, $uri): RequestInterface {
        $this
            ->validateMethod($method)
            ->validateUri($uri)
        ;

        if (is_string($uri)) {
            $uri = new Uri($uri);
        }

        return new Request(
            $method,
            $uri,
            $this->body,
            $this->headers,
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
