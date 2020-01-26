<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = [
        'post_id',
        'isActive',
        'author',
        'image',
        'email',
        'body'
    ];



    public function replay(){
        return $this->hasMany('App\CommentReplay');
    }
    public function post(){
        return $this->belongsTo('App\Post');
    }












}
