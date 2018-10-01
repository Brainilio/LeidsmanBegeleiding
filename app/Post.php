<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Table name
    protected $table = 'posts';
    public $primaryKey = 'id';
    public $timestamps = true;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function favourite() {
        return $this->belongsToMany(Favourite::class);
    }
}
