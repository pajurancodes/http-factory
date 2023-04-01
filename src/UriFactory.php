<?php

namespace PajuranCodes\Http\Message;

use Psr\Http\Message\{
    UriInterface,
    UriFactoryInterface,
};
use PajuranCodes\Http\Message\Uri;

/**
 * A factory to create a URI.
 *
 * @author pajurancodes
 */
class UriFactory implements UriFactoryInterface {

    /**
     * @inheritDoc
     */
    public function createUri(string $uri = ''): UriInterface {
        return new Uri($uri);
    }

}
