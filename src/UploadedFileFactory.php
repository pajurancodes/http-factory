<?php

namespace PajuranCodes\Http\Message;

use const UPLOAD_ERR_OK;
use Psr\Http\Message\{
    StreamInterface,
    UploadedFileInterface,
    UploadedFileFactoryInterface,
};
use PajuranCodes\Http\Message\UploadedFile;

/**
 * A factory to create an uploaded file.
 *
 * @author pajurancodes
 */
class UploadedFileFactory implements UploadedFileFactoryInterface {

    /**
     * @inheritDoc
     */
    public function createUploadedFile(
        StreamInterface $stream,
        int $size = null,
        int $error = UPLOAD_ERR_OK,
        string $clientFilename = null,
        string $clientMediaType = null
    ): UploadedFileInterface {
        return new UploadedFile($stream, $size, $error, $clientFilename, $clientMediaType);
    }

}
