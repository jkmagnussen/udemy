<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

        public function tags(){

        return $this->morphToMany('App\Models\Tag', 'taggable');
    }
}