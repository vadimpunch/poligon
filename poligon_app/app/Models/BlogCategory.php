<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class BlogCategory extends Model
{
    use SoftDeletes;

    const ROOT = 1;

    protected $fillable = [
        'title',
        'slug',
        'parent_id',
        'description'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parentCategory() {
       return $this->belongsTo(BlogCategory::class, 'parent_id', 'id');
    }

    public function getParentTitleAttribute() {
          return  $this->parentCategory->title ?? ($this->isRoot() ? 'Root' : '???');
    }

    private function isRoot() {
        return $this->id === BlogCategory::ROOT;
    }

    public function getTitleAttribute($value) {
        return strtoupper($value);
    }

    public function setTitleAttribute($value) {
        $this->attributes['title'] = strtolower($value);
    }

}
