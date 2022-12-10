<?php

namespace App\Http\Controllers;

use App\Models\User as ModelsUser;
use Houdunwang\Wechat\Qrcode;
use Houdunwang\Wechat\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

class WechatLoginController extends Controller
{
    protected $wx;
    public function __construct()
    {
        $this->wx = app(Qrcode::class)->config(config('hd.wechat'));
    }

    public function ticket()
    {
        $result = $this->wx->getQrTicket([
            "expire_seconds" => 600,
            "action_name" => "QR_STR_SCENE",
            "action_info" => ["scene" => ["scene_str" => "bind"]]
        ]);
        return $this->success('', $result);
    }

    //获取的登录二维码
    public function qrImage(string $ticket)
    {
        return $this->wx->getQrImageByTicket($ticket);
    }

    public function loginByTicket(string $ticket)
    {
        if ($cache = Cache::get($ticket)) {
            $info = app(User::class)->config(config('hd.wechat'))->getByOpenid($cache['FromUserName']);
            $user = ModelsUser::firstOrNew([
                'unionid' => $info['unionid']
            ]);
            $user['unionid'] = $info['unionid'];
            $user->save();
            Auth::login($user);

            return $this->success('登录成功', ['user' => $user]);
        }
    }
}
