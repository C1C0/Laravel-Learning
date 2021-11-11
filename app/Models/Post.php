<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Post extends Model
{
    use HasFactory;

    // enables to user Post::factory() -> looks into ...\PostFactory

    // when want to avoid one or more of them - use ->without('category' ...)
    protected $with = ['category', 'author'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Enables usage of: Post::filter()-> ...
     *
     * @param $query
     */
    public function scopeFilter($query, array $filters)
    {
        $query->when(
            $filters[Config::get('constants.GET_REQUEST.SEARCH')] ?? false,
            fn($query, $search) => $query->where(
                fn($query) => $query
                    ->where('title', 'like', "%".$search."%")
                    ->orWhere('body', 'like', "%".$search."%")
            )
        );

        $query->when(
            $filters[Config::get('constants.GET_REQUEST.CATEGORY')] ?? false,
            fn($query, $category) => $query->whereHas(
                'category',
                fn($query) => $query->where('slug', $category)
            )
        );

        $query->when(
            $filters[Config::get('constants.GET_REQUEST.AUTHOR')] ?? false,
            fn($query, $author) => $query->whereHas(
                'author',
                fn($query) => $query->where('username', $author)
            )
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    { // IMPORTANT: this alone would look for author_id !!!
        // We have to specify, which column we refer to => i.e. user_id
        return $this->belongsTo(User::class, 'user_id');
    }
}
