<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTopicRequest;
use App\Http\Requests\UpdateTopicRequest;
use App\Http\Resources\TopicResource;
use App\Models\Topic;
use Illuminate\Support\Facades\Auth;

class TopicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = Topic::with('user')->when(request('uid'), function ($query) {
            return $query->where('user_id', request('uid'));
        })->paginate(10);
        return TopicResource::collection($collection);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTopicRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTopicRequest $request, Topic $topic)
    {
        $topic->fill($request->input());
        $topic->user_id = Auth::id();
        $topic->save();
        return $this->success('贴子发表成功', $topic->load('user'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        $topic->html = $topic->html;
        return new TopicResource($topic->load('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTopicRequest  $request
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTopicRequest $request, Topic $topic)
    {
        $this->authorize('update', $topic);
        $topic->fill($request->input())->save();
        return $this->success('', $topic);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Topic  $topic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        $this->authorize('delete', $topic);
        $topic->delete();
        return $this->success("删除成功");
    }
}
