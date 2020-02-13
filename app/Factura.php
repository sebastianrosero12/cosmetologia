<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genres extends Model
{
    protected $table = 'genres';
    //protected $fillable = ['name', 'description', 'image'];

    public function  games(){
        return $this->hasMany(Videogames::class);
    }
}
