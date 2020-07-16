<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    protected $guarded = [];

//    protected $fillable = ['title','body','post_image'];

    public function user(){
        return $this->belongsTo(User::class);
    }


//    public function setPostImageAttribute($value){
//        $this->attributes['post_image'] = asset($value);
//    }

    public function getPostImageAttribute($value){
        return asset('storage/'.$value);
    }

}
