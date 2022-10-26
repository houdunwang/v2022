<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFavoriteRequest;
use App\Http\Requests\UpdateFavoriteRequest;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    public function toggle(string $type, $id)
    {
        $model = modelClass($type)::findOrFail($id);
        $model->favorites()->toggle([Auth::id()]);

        return [
            'total' => $model->favorites()->count(),
            //当前用户有没有关系这个资源
            'state' => $model->favorites()->wherePivot('user_id', Auth::id())->exists()
        ];
    }
}
