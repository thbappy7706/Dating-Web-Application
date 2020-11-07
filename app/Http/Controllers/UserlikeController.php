<?php

namespace App\Http\Controllers;


use App\Models\Userlike;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserlikeController extends Controller
{
    //

    public function __construct()
    {

    }

    public function index(Request $request)
    {
        $existingLike =  Userlike::where('liketry_id', Auth::id())
            ->where('user_id',$request->id)
            ->first();

        if(!is_null($existingLike)){
            $existingLike->update(['is_like' => !$existingLike->is_like]);
            $isLike = $existingLike->is_like;
        }else{
            $like = Auth()->user()->likes()->create([
                'liketry_type' => User::class,
                'is_like'       => true,
                'user_id'       => $request->id
            ]);
            $isLike = $like->is_like;
        }

        $isMutualLike = $this->isMutualLike($request->id);

        return response()->json(['is_mutual'=> $isMutualLike,'is_like' => $isLike]);
    }



    private function isMutualLike($id)
    {
        return  Userlike::where(function($query) use ( $id ){
                $query->where('liketry_id', auth()->id())
                    ->where('user_id', $id)
                    ->where('liketry_type', User::class)
                    ->where('is_like', true);
            })
                ->orWhere(function($query) use ( $id ){
                    $query->where('liketry_id', $id)
                        ->where('user_id', auth()->id())
                        ->where('liketry_type', User::class)
                        ->where('is_like', true);
                })->count() == 2;
    }







}
