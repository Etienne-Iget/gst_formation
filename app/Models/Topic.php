<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $guarded=[];
    
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

     
        /**
         * Get all of the post's comments.
         */
        public function comments()
        {
            return $this->morphMany('App\Models\Comment', 'commentable');
        }
      
}
