<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


// Post
//  ├── belongsTo User
//  ├── SoftDeletes
//  └── hasMany Comments (waitting)

class Post extends Model
{
    use HasFactory , SoftDeletes;

    //fillable -->detemine the columns that be mass assignable
    // protected $fillable = [];

    //guarded --> here all columns mass assignable
    protected $guarded = [];



}
