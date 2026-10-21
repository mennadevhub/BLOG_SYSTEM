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

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request) {
     // 1. Fetch The Request Data

        // $data = request()->all();
        // dd(request() , $request);

        // // $data = $request; //data about server , row ,.....
        // $data = $request -> all(); //row

        // dd(request());
        // dd($data);
        // dd($data->title);


     // 2. Insert The Request Data Into DB

        // Way_1: // don't need fillable here

        $post = new Post;

        $post->id = $request->id;
        $post->title = $request->title;
        $post->content = $request['content'];
        $post->created_by = $request->created_by;

        // $post->save(); //Don't be in within a database transaction
        $post->saveOrFail(); //If you would like to save the model within a database transaction, If an exception is thrown during the save, the transaction will automatically be rolled back


        // Way_2:
       //Mass Assignment تعين جماعي --> vulnerability --> to solving it used fillable

        // Post::create($request->all());
        //or
        // $post = Post::create([
        //     'id' => $request->id,
        //     'title' => $request->title,
        // ]);

        //or
        // $post = new Post();
        // $post->fill($request->all());
        // $post->saveOrFail();


     // 3. Show A Message To user About the State Of His Request & Redirect To The Suitable Page
        //    return redirect('/posts');
        return redirect()->route("posts.index");
    }


    public function show(int $post) {

        // select * from posts where id = $post;
        $post = Post::findOrFail($post);

        // $post = Post::where('id', $post); // error
        // dd($post);

        // $post = Post::where('id', $post)->first();
        // $post = Post::where('id', $post)->get(); // all results of condition
        // dd($post);

        return view('posts.show' , compact('post'));
    }

    public function edit(Post $post){

        // $post = Post::findOrFail($post);

        return view('posts.edit', compact('post'));
    }


    public function update(Request $request , Post $post){
        // dd( $request);

       $post->updateOrFail([
            'title' => $request->title,
            'content' => $request['content'],
            'created_by' => $request->created_by,
       ]);

       return redirect()->route('posts.index');
    }


    public function destroy(Post $post){
        // dd($post);
        $post->delete();
       return redirect()->route('posts.index');
    }


}
