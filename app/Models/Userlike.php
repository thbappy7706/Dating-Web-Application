<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userlike extends Model
{
    use HasFactory;


    protected  $guarded = [];

    public function liketry()
    {
        return $this->morphTo();
    }
}
