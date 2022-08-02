<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateSystemRequest;
use App\Http\Resources\SystemResource;
use App\Models\System;
use Illuminate\Http\Request;

//系统配置
class SystemController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
        $this->authorizeResource(System::class, 'system');
    }

    /**
     * 获取配置
     * @param Request $request
     * @param string $module
     */
    public function index(Request $request)
    {
        $system = System::firstOrFail();
        if (is_super_admin()) $system->makeVisible('config');
        return $this->success(data: new SystemResource($system));
    }

    /**
     * 更新系统配置
     * @param UpdateSystemRequest $request
     */
    public function update(UpdateSystemRequest $request, System $system)
    {
        $system->fill($request->input())->save();

        return $this->success('配置项更新成功');
    }
}
