<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Topic;

class Comment extends Model
{
    use HasFactory;
    
    protected $guarded=[];


    /**
     * Get all of the owning commentable models.
     */
    public function commentable()
    {
        return $this->morphTo();
    }

    public function comments(){
        return $this->morphMany('App\Models\Comment','commentable')->latest();
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

}
