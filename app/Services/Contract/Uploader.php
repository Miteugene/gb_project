<?php

namespace App\Services\Contract;

use Illuminate\Http\UploadedFile;

interface Uploader
{
    public function uploadImage(UploadedFile $file): string;
}
