<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostArticle extends Model
{
    //
    public function entryHistories()
    {
        return $this->hasMany('App\EntryHistory');
    }
}
