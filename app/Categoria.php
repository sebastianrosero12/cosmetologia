<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'Categoria';

    public function categoria(){
    	$categoria = Character::all();
        $genres = Genres::all();
        return view("vg.character.index", compact('characters', 'genres'));
    }
}
