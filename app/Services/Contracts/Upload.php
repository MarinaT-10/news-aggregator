<?php

declare(strict_types=1);

namespace App\Services\Contracts;

use Illuminate\Http\UploadedFile;

interface Upload
{
    /**
     * @param UploadedFile $uploadedFile
     * @return string
     */
    public function uploadImage(UploadedFile $uploadedFile): string;
}
