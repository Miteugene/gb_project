<?php

namespace App\Services;

use App\Services\Contract\Uploader;
use Illuminate\Http\UploadedFile;
use Symfony\Component\HttpFoundation\File\Exception\UploadException;

class UploadService implements Uploader
{
    public function uploadImage(UploadedFile $file): string
    {
        $path = $file->storeAs('news', $file->hashName(), 'upload');
        if(!$path) {
            throw new UploadException('File upload error');
        }

        return $path;
    }
}
