<?php


namespace App\Client\FileUpload;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class LocalFileUploader implements FileUploaderInterface
{
    public function upload(UploadedFile $file, $path = null, $retainFileName = false): array
    {
        $originalName = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $mimeType = $file->getClientMimeType();
        $fileName = $retainFileName ? $originalName : uuid_create() . '.' . $extension;
        $filePath =  Storage::disk('public')->putFileAs($path, $file, $fileName);
        return [
            'path' => $filePath,
            'name' => $fileName,
            'mime_type' => $mimeType,
            'original_name' => $originalName,
            'disk' => 'public'
        ];
    }

    public function unlink($path): bool
    {
        return Storage::disk('public')->delete($path);
    }

    public function uploadBase64($img, $path = null, $retainFileName = false): array
    {
        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];

        $image_base64 = base64_decode($image_parts[1]);
        $fileName = $retainFileName ? $image_type_aux[1] . '.' . uniqid() : uniqid() . '.' . $image_type_aux[1];

        // Save the base64-decoded content to a temporary file
        $tempFilePath = sys_get_temp_dir() . '/' . $fileName;
        file_put_contents($tempFilePath, $image_base64);

        // Create an UploadedFile instance from the temporary file
        $file = $this->upload(
            new UploadedFile($tempFilePath, $fileName, $image_type),
            $path,
            $retainFileName
        );

        // Remove the temporary file
        unlink($tempFilePath);

        return  $file;
    }
}
