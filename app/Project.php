<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Project extends Model
{
    protected $fillable = [
        'auth', 'title', 'image','content','user_id'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
