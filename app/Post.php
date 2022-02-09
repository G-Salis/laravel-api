<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'slug',
        'category_id'
    ];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }



    public static function generateSlug($title){
        $slug = Str::slug($title);
        $slug_originale = $slug;

        $post_presente = Post::where('slug', $slug)->first();

        $c = 1;
        while($post_presente){
            $slug = $slug_originale . '-' . $c;
            $c++;
            $post_presente = Post::where('slug', $slug)->first();
        }
        return $slug;
    }
}
