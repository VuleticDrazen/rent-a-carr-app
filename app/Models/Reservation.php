<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    const PER_PAGE = 5;
    protected  $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }


    public function car(){
        return $this->hasOne(Car::class);
    }

    public function locationp(){
        return Location::query()->find($this->lokacija_preuzimanja);

    }

    public function locationv(){
        return Location::query()->find($this->lokacija_vracanja);

    }
}
