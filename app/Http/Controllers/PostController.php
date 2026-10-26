<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PostController extends Controller
{
    use AuthorizesRequests;

    public function index() {
        // select * from posts;

        // $posts = Post::all();
        //  $posts = Post::withTrashed()->get();

        $posts = Post::withTrashed()->paginate(5);
        // dd($posts);

        // $user = Auth::user();
        // dd($user);

        return view('posts.index' , ['posts' => $posts]);
    }

    public function create() {
        // return view('posts.create' , ['users'=> User::all()]);
        return view('posts.create');
    }

    public function store(Request $request) {
        //  $user = $request->user();
        //  dd($user);
        // dd($request);

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

        // $post = new Post;

        // $post->id = $request->id;
        // $post->title = $request->title;
        // $post->content = $request['content'];
        // $post->created_by = $request->created_by;


        // $post = new Post([
        //     'title' => $request->title,
        //     'content' => $request['content'],
        //     'created_by'=> Auth::id(),
        // ]);

        // $post->save(); //Don't be in within a database transaction
        // $post->saveOrFail(); //If you would like to save the model within a database transaction, If an exception is thrown during the save, the transaction will automatically be rolled back


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


        // Way_3: Vlidation & security
       //Mass Assignment تعين جماعي --> vulnerability --> to solving it used fillable

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]);

        $request->user()->posts()->create($validated);




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
        $this->authorize('update', $post);
        return view('posts.edit', compact('post'));
    }


    public function update(Request $request , Post $post){
        // dd( $request);

        $this->authorize('update', $post);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]);

        $post->updateOrFail($validated);

       return redirect()->route('posts.index');
    }


    public function destroy(Post $post){
        $this->authorize('delete', $post);
         $post->delete();
       return redirect()->route('posts.index');
    }

    public function restore(int $id){
        $post= Post::withTrashed()->findOrFail($id);
        $this->authorize('restore', $post);
        $post->restore();
        return redirect()->route('posts.index');
    }

    public function forceDelete(int $id){
        $post= Post::withTrashed()->findOrFail($id);
        $this->authorize('forceDelete', $post);
        $post->forceDelete();
        return redirect()->route('posts.index');
    }


}
