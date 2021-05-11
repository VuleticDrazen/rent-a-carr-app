<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    const PER_PAGE = 5;
    protected  $guarded = [];

    public function category(){
        return Category::query()->find($this->kategorija_id);

    }


}
