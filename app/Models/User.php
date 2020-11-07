<?php

namespace App\Models;

use App\Models\Userlike;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'birth_date',
        'image',
        'latitude',
        'longitude',
        'gender',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];




    public function react()
    {
        return $this->morphMany(Userlike::class,'liketry');
    }

    public function getAgeAttribute()
    {
        $birth_date = $this->birth_date;
        $today = date("Y-m-d");
        $diff = date_diff(date_create($birth_date), date_create($today));
        return $diff->format('%y');
    }

    public function isLiked($user)
    {
        return $this->react()->where('user_id',$user)
            ->where('is_like', true)
            ->exists();
    }

    public function getDistanceAttribute()
    {
        return round(6371 * acos(
                cos(deg2rad($this->latitude)) * cos(deg2rad(auth()->user()->latitude))
                * cos(deg2rad(auth()->user()->longitude) - deg2rad($this->longitude))
                + sin(deg2rad($this->latitude)) * sin(deg2rad(auth()->user()->latitude))
            ),2);
    }




}
