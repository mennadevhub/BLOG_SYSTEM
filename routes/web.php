<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/all-posts', function () {
    $posts = [
        ['id'=> 1, 'title' => 'Post 1', 'posted_by' => 'John Doe', 'created_at' => '2021-01-01'],
        ['id'=> 2, 'title' => 'Post 2', 'posted_by' => 'Jane Smith', 'created_at' => '2021-01-02'],
        ['id'=> 3, 'title' => 'Post 3', 'posted_by' => 'Bob Johnson', 'created_at' => '2021-01-03'],
    ];
    return view('test' , ['posts' => $posts]);
});

