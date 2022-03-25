<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;

class UploadService
{
    public function avatar(UploadedFile $file)
    {
        $path = $file->store("images/avatars" . DIRECTORY_SEPARATOR . date('Ym'));

        Image::load(Storage::path($path))
            ->crop(Manipulations::CROP_CENTER, config('hd.upload.avatar_crop_width'), config('hd.upload.avatar_crop_height'))
            ->save();

        return [
            'path' => $path,
            'url' => asset($path),
        ];
    }
}
