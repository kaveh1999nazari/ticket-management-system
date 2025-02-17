<?php

namespace App\Service;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class MediaService
{
    public static function uploadMedia(UploadedFile $file, $mediable)
    {
        $directory = 'public/uploads';
        if (!Storage::exists($directory)) {
            Storage::makeDirectory($directory, 0755, true);
        }

        $path = $file->store('uploads', 'public');

        return $mediable->medias()->create([
            'name' => $file->getClientOriginalName(),
            'path' => $path,
        ]);
    }
}
