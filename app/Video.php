<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{

    protected $fillable = [
        'videoId', 'title', 'description'
    ];

    protected $hidden = [];

    public function searches()
    {
        return $this->belongsToMany('App\Search');
    }


}
