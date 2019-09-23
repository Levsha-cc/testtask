<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{

    protected $fillable = ['query'];

    protected $hidden = [];

    public function videos()
    {
        return $this->belongsToMany('App\Video');
    }

}
