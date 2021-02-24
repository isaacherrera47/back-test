<?php

namespace App\Http\Services;

use Illuminate\Http\UploadedFile;

class ImageBase64Processor
{
    /**
     * @param $file
     *
     * @return string
     */
    public function __invoke($file): string
    {
        return base64_encode(file_get_contents($file));
    }
}
