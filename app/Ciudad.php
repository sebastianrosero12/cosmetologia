<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $table = 'characters';

    public function game(){
        return $this->belongsTo(Videogames::class);
    }
}

