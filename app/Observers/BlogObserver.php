<?php

namespace App\Observers;

use App\Helpers\Helpers;
use App\Models\Blog;
use Illuminate\Support\Str;

class BlogObserver
{

    private $path_image = 'blog';

    /**
     * Handle the Blog "creating" event.
     *
     * @param  \App\Models\Blog  $blog
     * @return void
     */

    public function creating(Blog $blog)
    {
        
    }

    /**
     * Handle the Blog "updated" event.
     *
     * @param  \App\Models\Blog  $blog
     * @return void
     */
    public function updated(Blog $blog)
    {
        //
    }

    /**
     * Handle the Blog "deleted" event.
     *
     * @param  \App\Models\Blog  $blog
     * @return void
     */
    public function deleted(Blog $blog)
    {
        //
    }

    /**
     * Handle the Blog "restored" event.
     *
     * @param  \App\Models\Blog  $blog
     * @return void
     */
    public function restored(Blog $blog)
    {
        //
    }

    /**
     * Handle the Blog "force deleted" event.
     *
     * @param  \App\Models\Blog  $blog
     * @return void
     */
    public function forceDeleted(Blog $blog)
    {
        //
    }
}
