<?php

namespace PajuranCodes\Http\Message;

use Psr\Http\Message\{
    ResponseInterface,
    ResponseFactoryInterface,
};
use PajuranCodes\Http\Message\{
    Response,
    MessageFactory,
};

/**
 * A factory to create a HTTP response.
 * 
 * @author pajurancodes
 */
class ResponseFactory extends MessageFactory implements ResponseFactoryInterface {

    /**
     * @inheritDoc
     */
    public function createResponse(int $code = 200, string $reasonPhrase = ''): ResponseInterface {
        return new Response(
            $this->body,
            $code,
            $reasonPhrase,
            $this->headers,
            $this->protocolVersion
        );
    }

}
