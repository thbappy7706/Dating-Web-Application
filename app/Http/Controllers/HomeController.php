<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $users = User::all();
        return view('home' ,compact('users'));
    }


    public function closeUser()
    {
        $latitude = session()->get('location.latitude');
        $longitude = session()->get('location.longitude');
        $users = $this->getUsersFromCurrentLocation($latitude, $longitude,5);
        return view('closeuser',compact('users'));
    }


    public function getUsersFromCurrentLocation( $lat, $long, $distance)
    {
        return User::all()
            ->except(Auth::id())
            ->filter(function ($user) use ($lat, $long, $distance) {
                $actual = 6371 * acos(
                        cos(deg2rad($lat)) * cos(deg2rad($user->latitude))
                        * cos(deg2rad($user->longitude) - deg2rad($long))
                        + sin(deg2rad($lat)) * sin(deg2rad($user->latitude))
                    );
                return $distance > $actual;
            });
    }
}
