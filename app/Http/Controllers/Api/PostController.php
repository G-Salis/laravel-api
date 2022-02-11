<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::with(['category', 'tags'])->paginate(5);

        return response()->json($posts);
    }

    public function show($slug){
        $post = Post::where('slug', $slug)->with('tags', 'category')->first();

        if(!$post){
            $post = ['title' => 'Post non trovato', 'content' => 'Content non trovato'];
        }

        return response()->json($post);
    }
}
