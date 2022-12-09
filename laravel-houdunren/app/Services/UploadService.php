<?php

namespace App\Services;

use AlibabaCloud\SDK\Dysmsapi\V20170525\Dysmsapi;
use Darabonba\OpenApi\Models\Config;
use AlibabaCloud\SDK\Dysmsapi\V20170525\Models\SendSmsRequest;
use AlibabaCloud\Tea\Utils\Utils\RuntimeOptions;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;

class UploadService
{
    public function image($file, $width = 800, $heigh = 800, $fit = Manipulations::FIT_CONTAIN)
    {
        $filePath =  $file->store('attachments');
        $realPath = storage_path('app/' . $filePath);
        Image::load($realPath)->fit($fit, $width, $heigh)->save();
        $action = config('hd.upload.type');
        return $this->$action($filePath);
    }

    protected function local(string $path)
    {
        return url($path);
    }

    protected function oss(string $path)
    {
        return app(OssService::class)->image($path);
    }
}
