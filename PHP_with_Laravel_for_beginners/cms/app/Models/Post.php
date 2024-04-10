<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// use Illuminate\Database\Eloquent\Factories\HasFactory;


class Post extends Model {

    public $directory = "/images/";

    use SoftDeletes;
   
    // use HasFactory;

    protected $table = 'posts';

    // protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'title',
        'content',
        'path'

    ];


    public function user(){
        return $this->belongsTo('App\Models\User', 'id', 'user_id');
    }

    public function photos(){
        return $this->morphMany('App\Models\Photo', 'imageable');
    }

    public function tags(){
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }


    public static function scopeLatest($query){
        return $query->orderBy('id', 'asc')->get();
    } 

// This is an 'Accessor' it retrieves the data 
// When using an accessor, get is complusory, then the name of the column which you wish to focus on, in this case it is 'path' followed by 'Attribute. 
    
 public function getPathAttribute($value){
        // return ucfirst($value);
        return $this->directory . $value;
    }
} 