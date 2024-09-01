<?php

namespace App\Client\FileUpload;

use Illuminate\Http\UploadedFile;

interface FileUploaderInterface
{
    public function upload(UploadedFile $file, $path = null, $retainFileName = false): array;

    public function unlink($path): bool;

    public function uploadBase64($file, $path = null, $retainFileName = false): array;
}
