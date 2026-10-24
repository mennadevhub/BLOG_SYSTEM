<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
   public function index(){

        //  return Post::all();
        //   return post::withTrashed()->get();

        $posts= Post::all()->toResourceCollection();
        return $posts;
        // return PostResource::collection($posts);

   }

      public function show(int $id){

        //  return Post::all();
        //   return post::withTrashed()->get();

        $post= Post::find($id)->toResource();
        return $post;
        // return new PostResource($post);

   }



}
