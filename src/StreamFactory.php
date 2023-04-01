<?php

namespace PajuranCodes\Http\Message;

use Psr\Http\Message\{
    StreamInterface,
    StreamFactoryInterface,
};
use PajuranCodes\Http\Message\Stream;

/**
 * A factory to create a stream.
 *
 * @author pajurancodes
 */
class StreamFactory implements StreamFactoryInterface {

    /**
     * @inheritDoc
     */
    public function createStream(string $content = ''): StreamInterface {
        /*
         * Create a stream with read-write access.
         *  'r+': open for reading and writing.
         *  'b': force to binary mode.
         */
        $stream = $this->createStreamFromFile('php://temp', 'r+b');

        $stream->write($content);

        return $stream;
    }

    /**
     * @inheritDoc
     */
    public function createStreamFromFile(string $filename, string $mode = 'r'): StreamInterface {
        return new Stream($filename, $mode);
    }

    /**
     * @inheritDoc
     */
    public function createStreamFromResource($resource): StreamInterface {
        return new Stream($resource);
    }

}
