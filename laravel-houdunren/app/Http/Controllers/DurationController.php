<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDurationRequest;
use App\Http\Requests\UpdateDurationRequest;
use App\Models\Duration;

class DurationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDurationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDurationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Duration  $duration
     * @return \Illuminate\Http\Response
     */
    public function show(Duration $duration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Duration  $duration
     * @return \Illuminate\Http\Response
     */
    public function edit(Duration $duration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDurationRequest  $request
     * @param  \App\Models\Duration  $duration
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDurationRequest $request, Duration $duration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Duration  $duration
     * @return \Illuminate\Http\Response
     */
    public function destroy(Duration $duration)
    {
        //
    }
}
