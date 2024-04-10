<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model {
    use HasFactory;

    protected $guarded = [];

    public function permissions() {
        return $this->belongsToMany(Permission::class);
    }

    public function users() {
        return $this->belongsToMany(User::class);
    }


    // using php artisan tinker - 
    // COMMAND > $admin = App\Models\Role::create(['name'=>'Admin', 'slug'=>'admin'])
    // OUTPUT: 
    // = App\Models\Role {#4687
    //     name: "Admin",
    //     slug: "admin",
    //     updated_at: "2023-01-29 18:20:24",
    //     created_at: "2023-01-29 18:20:24",
    //     id: 1,
    //   }
}