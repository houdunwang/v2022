<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSignRequest;
use App\Http\Requests\UpdateSignRequest;
use App\Http\Resources\SignResource;
use App\Models\Sign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignController extends Controller
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
    public function index(Request $request)
    {
        $signs = Sign::whereDate('created_at', now())->paginate($request->query('row', 10));
        return SignResource::collection($signs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSignRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSignRequest $request, Sign $sign)
    {
        $this->authorize('create', Sign::class);

        $sign->user_id = Auth::id();
        $sign->fill($request->input())->save();

        return $this->success('签到成功', $sign);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sign  $sign
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sign $sign)
    {
        $this->authorize('delete', $sign);
        $sign->delete();
        return $this->success('删除成功');
    }
}
