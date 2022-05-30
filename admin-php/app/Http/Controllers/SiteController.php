<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSiteRequest;
use App\Http\Requests\UpdateSiteRequest;
use App\Http\Resources\SiteResource;
use App\Models\site;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function index()
    {
        return $this->success('站点列表获取成功', data: SiteResource::collection(site::orderBy('id', 'desc')->get()));
    }


    public function store(StoreSiteRequest $request, Site $site)
    {
        $site->fill($request->input());
        $site->user_id = Auth::id();
        $site->save();
        return $this->success('站点添加成功', data: new SiteResource($site));
    }

    public function show(site $site)
    {
        return $this->success('站点详情获取成功', data: new SiteResource($site));
    }

    public function update(UpdateSiteRequest $request, site $site)
    {
        $site->fill($request->input())->save();
        return $this->success('站点更新成功', data: new SiteResource($site));
    }

    public function destroy(site $site)
    {
        $site->delete();
        return $this->success('站点删除成功');
    }
}
