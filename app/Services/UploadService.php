<?php

declare(strict_types=1);

namespace App\Services;

use App\Services\Contracts\Upload;
use Illuminate\Http\UploadedFile;
use Symfony\Component\HttpFoundation\File\Exception\UploadException;

class UploadService implements Upload
{
    public function uploadImage(UploadedFile $uploadedFile): string
    {
        $name = $uploadedFile->hashName();
        $path = $uploadedFile->storeAs('news', $name, 'public');

        if ($path === false) {
            throw new UploadException("File was not upload");
        }

        return $path;
    }
}
