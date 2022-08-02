<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSiteRequest;
use App\Http\Requests\UpdateSiteRequest;
use App\Http\Resources\SiteResource;
use App\Models\Site;
use Illuminate\Support\Facades\Auth;

//站点
class SiteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
        $this->authorizeResource(Site::class, 'site');
    }

    public function index()
    {
        $sites = Site::latest()->with('master');
        if (!is_super_admin())
            $sites->where('user_id', Auth::id())
                ->orWhereRelation('admins', 'user_id', Auth::id());

        return SiteResource::collection($sites->paginate(request('row', 10)));
    }

    public function store(StoreSiteRequest $request, Site $site)
    {
        $this->authorize('create', Site::class);
        $site->fill($request->input());
        $site->user_id = Auth::id();
        $site->save();

        return $this->success('站点添加成功', new SiteResource($site));
    }

    public function show(Site $site)
    {
        return $this->success(data: new SiteResource($site->makeVisible('config')));
    }

    public function update(UpdateSiteRequest $request, Site $site)
    {
        $this->authorize("update", $site);
        $site->fill($request->input())->save();

        return $this->success('站点更新成功', data: $site->refresh()->makeVisible(['config']));
    }

    public function destroy(Site $site)
    {
        $this->authorize('delete', $site);
        $site->delete();

        return $this->success('站点删除成功');
    }
}
