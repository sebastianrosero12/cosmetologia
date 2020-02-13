<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Platforms extends Model
{
    protected $table = 'platforms';

    protected $fillable = ['name', 'aliases', 'description', 'image', 'release_date', 'company_id'];

    public function company(){
        return $this->belongsTo(Companies::class);
    }

    public function games(){
        return $this->belongsToMany(Games::class)->withTimestamps();
    }
}
