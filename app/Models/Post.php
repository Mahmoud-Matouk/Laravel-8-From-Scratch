<?php

namespace App\Models;

use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = ['category_id', 'slug', 'title', 'excerpt', 'body'];

    // TODO do this in php artisan tinker
    /*
        Post::create(['category_id' => '3', 'slug' => 'My-Third-Post', 'title' => 'My Third Post', 'excerpt' => 'My Third Post excerpt', 'body' => 'My Third Post body']);
    */

    // TODO Pass the url by it's slug
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // TODO Relationships : hasOne - hasMany - belongsTo - belongsToMany
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
