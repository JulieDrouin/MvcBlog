<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comm extends Model
{
    protected $fillable = [
        'id', 'body', 'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
