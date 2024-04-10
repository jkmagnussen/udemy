<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    // get mass assignment ready (this ensures these fields are fillable): 

    protected $fillable = [
        'title',
        'body'
    ];
}