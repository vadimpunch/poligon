<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class BlogPost
 * @package App\Models
 * @property string $content_raw
 * @property string $title
 * @property string $slug
 * @property boolean $is_published
 * @property string $published_at
 * @property \App\Models\User $user
 * @property \App\Models\BlogCategory $categoey
 *
 */
class BlogPost extends Model
{

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'category_id',
        'content_raw',
        'is_published',
        'published_at',
        'user_id'
    ];
    use SoftDeletes;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(BlogCategory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
