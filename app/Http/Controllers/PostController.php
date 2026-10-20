<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        // select * from posts;
        $posts = Post::all();
        // dd($posts);

        return view('posts.index' , ['posts' => $posts]);
    }

    public function show(int $post) {

        // select * from posts where id = $post;
        // $post = Post::find($post);

        // $post = Post::where('id', $post); // error
        // dd($post);

        // $post = Post::where('id', $post)->first();
        // $post = Post::where('id', $post)->get(); // all results of condition
        // dd($post);

        return view('posts.show' , ['post' => $post]);
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request) {
     // 1. Fetch The Request Data
        // $data = request()->all();
        // dd(request() , $requestformdata);
        // $data = $request -> all();
        // dd(request());
        // dd($data);
        // dd($data->title);



     // 2. Insert The Request Data Into DB

        // Way_1: // don't need fillable here
        // $post = new Post;

        // $post->id = $request->id;
        // $post->title = $request->title;
        // $post->content = $request['content'];
        // $post->created_by = $request->posted_by;

        // $post->save(); //Don't be in within a database transaction
        // $post->saveOrFail(); //If you would like to save the model within a database transaction, If an exception is thrown during the save, the transaction will automatically be rolled back


        // Way_2:
       //Mass Assignment تعين جماعي --> vulnerability --> to solving it used fillable

        // Post::create($request->all());

        //or
        // $post = new Post();
        // $post->fill($request->all());
        // $post->save();

        //or
        $post = Post::create([
           'title' => $request->title,
        ]);


     // 3. Show A Message To user About the State Of His Request & Redirect To The Suitable Page
        //    return redirect('/posts');
        return redirect()->route("posts.index");
    }


}
