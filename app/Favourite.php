<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Favourite extends Model
{

    protected $table = 'favourites';

    public function user() {
        $this->belongsTo(User::class);
    }

    public function post() {
        $this->hasMany(Post::class);
    }


}







