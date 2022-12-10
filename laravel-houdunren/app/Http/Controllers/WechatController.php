<?php

namespace App\Http\Controllers;

use Houdunwang\Wechat\Message;
use Houdunwang\Wechat\Wechat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class WechatController extends Controller
{
    protected $wx;
    public function __invoke()
    {
        $this->wx = app(Message::class)->config(config('hd.wechat'))->bind();

        return $this->scanQrLogin();
    }

    public function scanQrLogin()
    {
        //# 用户是否扫了吗关注了zong号  id   id   openid
        if ($this->wx->isScan()) {
            Cache::put($this->wx->message['Ticket'], $this->wx->message, now()->addMinutes(10));
            return $this->wx->text('登录成功');
        }
    }
}
