<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // TODO do this in php artisan tinker
    /*
        Category::create(['name' => 'My First Post', 'slug' => 'My-First-Post']);
    */

    // TODO Relationships : hasOne - hasMany - belongsTo - belongsToMany
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
