<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLearnHistoryRequest;
use App\Http\Requests\UpdateLearnHistoryRequest;
use App\Http\Resources\LearnHistoryResource;
use App\Models\LearnHistory;
use App\Models\User;

class LearnHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = LearnHistory::limit(request('row', 10))->with(['user', 'video'])->get();

        return LearnHistoryResource::collection($collection);
    }

    public function getByUser(User $user)
    {
        $collection = LearnHistory::where('user_id', $user->id)->with(['user', 'video'])->paginate(request('row', 10));
        return LearnHistoryResource::collection($collection);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLearnHistoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLearnHistoryRequest $request)
    {
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LearnHistory  $learnHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(LearnHistory $learnHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLearnHistoryRequest  $request
     * @param  \App\Models\LearnHistory  $learnHistory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLearnHistoryRequest $request, LearnHistory $learnHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LearnHistory  $learnHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(LearnHistory $learnHistory)
    {
        //
    }
}
