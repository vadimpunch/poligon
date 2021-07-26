<?php

namespace App\Observers;

use App\Models\BlogPost;
use Illuminate\Support\Str;

class BlogPostObserver
{

    public function creating(BlogPost $blogPost) {
        $this->setPublishedAt($blogPost);
        $this->setSlug($blogPost);
        $this->setUser($blogPost);
        $this->setHtml($blogPost);

    }
    /**
     * Handle the blog post "created" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function created(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the blog post AFTER "updated" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function updated(BlogPost $blogPost)
    {
        //
    }


    /**
     * Handle the blog post BEFORE "updated" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function updating(BlogPost $blogPost)
    {
        $this->setPublishedAt($blogPost);
        $this->setSlug($blogPost);

    }



    /**
     * Handle the blog post "deleted" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function deleted(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the blog post "restored" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function restored(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the blog post "force deleted" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function forceDeleted(BlogPost $blogPost)
    {
        //
    }

    /**
     * Automatically set published_at
     *
     * @param BlogPost $blogPost
     */
    protected function setPublishedAt(BlogPost $blogPost) {
        if(!$blogPost->published_at && $blogPost->is_published) {
            $blogPost->published_at = Carbon::now();
        }
    }

    /**
     *  Set slug by title if slug empty
     *
     * @param BlogPost $blogPost
     * @return void
     */
    protected function setSlug(BlogPost $blogPost) {
        if(empty($blogPost->slug)) {
            $blogPost->slug = Str::slug($blogPost->title);
        }
    }

    /**
     * @param BlogPost $blogPost
     */
    protected function setUser(BlogPost $blogPost) {
        $blogPost->user_id = auth()->id() ?? BlogPost::UNKNOWN_USER;

    }

    /**
     * @param BlogPost $blogPost
     */
    protected function setHtml(BlogPost $blogPost) {
        if($blogPost->isDirty('content_raw')) {
            $blogPost->content_html = $blogPost->content_raw;
        }
    }
}
