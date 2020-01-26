<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReplay extends Model
{
    //

    protected $fillable = [
        'comment_id',
        'isActive',
        'author',
        'email',
        'body',
        'image'
    ];

    public function comment(){
        return $this->belongsTo('App\Comment');
    }


}
