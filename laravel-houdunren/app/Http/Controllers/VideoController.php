<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Http\Resources\VideoResource;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except(['index']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return VideoResource::collection(Video::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVideoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVideoRequest $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        $video->learnHistory()->syncWithPivotValues([Auth::id()], ['lesson_id' => $video->lesson_id], false);
        return new VideoResource($video->makeVisible(['path'])->load('lesson.system'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVideoRequest  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVideoRequest $request, Video $video)
    {
    }
}
