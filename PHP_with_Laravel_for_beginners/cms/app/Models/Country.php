<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;


    public function posts(){
        return $this->hasManyThrough('App\Models\Post', 'App\Models\User', 'country_id', 'user_id');

        // User is the intermediate table, linking Posts to Country, 
        // which otherwise has no link. 

        // country_id is a column name in User 
        // user_id is a column name in Post 

        // ('target table', 'intermediate table', 'intermediate table link column', 'target table link to intermediate table')
    }
}