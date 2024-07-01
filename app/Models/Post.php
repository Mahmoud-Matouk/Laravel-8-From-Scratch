<?php

namespace App\Models;

use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

/**
 * @method static latest()
 */
class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = ['category_id', 'slug', 'title', 'excerpt', 'body'];
    protected $with = ['author', 'category'];

    // TODO do this in php artisan tinker
    /*
        Post::create(['category_id' => '3', 'slug' => 'My-Third-Post', 'title' => 'My Third Post', 'excerpt' => 'My Third Post excerpt', 'body' => 'My Third Post body']);
    */

    // TODO Pass the url by it's slug
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false , fn ($query, $search) =>
            $query
                ->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%'));

        $query->when($filters['category'] ?? false , fn ($query, $category) =>
            $query->whereHas('category', fn($query) =>
                  $query->where('slug', $category)
            ));

        $query->when($filters['author'] ?? false , fn ($query, $author) =>
            $query->whereHas('author', fn($query) =>
                  $query->where('username', $author)
            ));

    }

    // TODO Relationships : hasOne - hasMany - belongsTo - belongsToMany
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
