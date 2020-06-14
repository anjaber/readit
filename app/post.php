<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class post extends Model
{

    use SoftDeletes;
    protected $fillable = [
        'title' , 'description' , 'content' , 'image' , 'category_id',
];

public function category()
{
    return $this->belongsTo('App\category');
}

public function useronly()
{
    return $this->belongsTo('App\User');
}


public function tags(){
    return $this->belongsToMany('App\Tag');
}


public function comments(){
    return $this->hasMany('App\Comment');
}

}
