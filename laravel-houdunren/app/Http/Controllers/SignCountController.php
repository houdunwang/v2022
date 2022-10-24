<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSignCountRequest;
use App\Http\Requests\UpdateSignCountRequest;
use App\Models\SignCount;

class SignCountController extends Controller
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
     * @param  \App\Http\Requests\StoreSignCountRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSignCountRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SignCount  $signCount
     * @return \Illuminate\Http\Response
     */
    public function show(SignCount $signCount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SignCount  $signCount
     * @return \Illuminate\Http\Response
     */
    public function edit(SignCount $signCount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSignCountRequest  $request
     * @param  \App\Models\SignCount  $signCount
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSignCountRequest $request, SignCount $signCount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SignCount  $signCount
     * @return \Illuminate\Http\Response
     */
    public function destroy(SignCount $signCount)
    {
        //
    }
}
