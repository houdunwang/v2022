<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSystemRequest;
use App\Http\Requests\UpdateSystemRequest;
use App\Http\Resources\SystemResource;
use App\Models\System;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = System::orderBy('order', 'asc')->get();
        return SystemResource::collection($collection);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSystemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSystemRequest $request, System $system)
    {
        $this->authorize('create', System::class);
        $system->fill($request->input())->save();
        return $this->success('发表成功', $system);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\System  $system
     * @return \Illuminate\Http\Response
     */
    public function show(System $system)
    {
        return new SystemResource($system->load('lessons'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSystemRequest  $request
     * @param  \App\Models\System  $system
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSystemRequest $request, System $system)
    {
        $this->authorize('update', $system);

        $system->fill($request->input())->save();

        return $this->success('更新成功', $system);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\System  $system
     * @return \Illuminate\Http\Response
     */
    public function destroy(System $system)
    {
        $this->authorize('delete', $system);
        $system->delete();
        return $this->success('删除成功');
    }

    public function order(Request $request)
    {
        $this->authorize('order', System::class);

        collect($request->system)->map(function ($value, $index) {
            $model = System::find($value);
            $model->order = $index;
            $model->save();
        });

        return $this->success('排序成功');
    }
}
