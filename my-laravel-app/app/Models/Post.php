<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['title', 'body'];

    public function comment() {
      // return $this->hasMany('App\Models\Comment');
      return $this->hasMany(Comment::class);
    }

}
