<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadAvatarRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UploadController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function avatar(UploadAvatarRequest $request)
    {
        $res = app('upload')->avatar($request->file);
        $user =  Auth::user();
        $user->avatar = $res['url'];
        $user->save();
        return ['url' => $res['url']];
    }
}
