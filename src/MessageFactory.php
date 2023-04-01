<?php

namespace PajuranCodes\Http\Message;

use Psr\Http\Message\StreamInterface;

/**
 * A factory to create a HTTP message.
 *
 * @author pajurancodes
 */
abstract class MessageFactory {

    /**
     * 
     * @param StreamInterface $body The body of a HTTP message.
     * @param (string|string[])[] $headers (optional) A list of headers with case-insensitive header names.
     * @param string $protocolVersion (optional) A version of the HTTP protocol.
     */
    public function __construct(
        protected readonly StreamInterface $body,
        protected array $headers = [],
        protected string $protocolVersion = '1.1'
    ) {
        
    }

}
