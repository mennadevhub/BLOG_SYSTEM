<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // protected $fillable = []; //fillable -->detemine the columns that be mass assignable
    protected $guarded = []; // guarded --> here all columns mass assignable
}
