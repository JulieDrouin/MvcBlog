<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'id','title', 'content', 'tags', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
        //return $this->belongsTo('App\User', 'user_id','id');
    }
    protected $table = 'posts';

    public function comments()
    {
        return $this->morphMany(Comm::class, 'commentable');
    }
}
