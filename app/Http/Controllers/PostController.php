<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index() {
        $posts = [
            ['id'=> 1, 'title' => 'Post 1', 'posted_by' => 'John Doe', 'created_at' => '2021-01-01'],
            ['id'=> 2, 'title' => 'Post 2', 'posted_by' => 'Jane Smith', 'created_at' => '2021-01-02'],
            ['id'=> 3, 'title' => 'Post 3', 'posted_by' => 'Bob Johnson', 'created_at' => '2021-01-03'],
        ];

        return view('posts.index' , ['posts' => $posts]);
    }

    public function show(int $post) {

        if($post == 1) {
            $post = ['id'=> 1, 'title' => 'Post 1','content' => 'This is the first post', 'posted_by' => 'John Doe', 'created_at' => '2021-01-01'];

        } elseif($post == 2) {
            $post = ['id'=> 2, 'title' => 'Post 2','content' => 'This is the second post', 'posted_by' => 'Jane Smith', 'created_at' => '2021-01-02'];

        } elseif($post == 3) {
            $post = ['id'=> 3, 'title' => 'Post 3','content' => 'This is the third post', 'posted_by' => 'Bob Johnson', 'created_at' => '2021-01-03'];

        } else {
            abort(404);

        }

        return view('posts.show' , ['post' => $post]);
    }

    public function create() {
        return view('posts.create');
    }

    public function store() {
       return view('posts.store');
    }
}
