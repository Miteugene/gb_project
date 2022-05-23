<?php

namespace App\Observers;

use App\Models\News;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class NewsObserver
{
    /**
     * Handle the News "created" event.
     *
     * @param  \App\Models\News  $news
     * @return void
     */
    public function created(News $news)
    {
        //
    }

    /**
     * @param  \App\Models\News  $news
     */
    public function creating(News $news)
    {
        $this->setSlug($news);
    }

    /**
     * @param  \App\Models\News  $news
     */
    protected function setSlug(News $news)
    {
        if (empty($news->slug)) {
            $news->slug = Str::slug(Carbon::parse($news->created_at)->format('Y-m-d') . '-' . $news->title);
        }
    }

    /**
     * Handle the News "updated" event.
     *
     * @param  \App\Models\News  $news
     * @return void
     */
    public function updated(News $news)
    {
        //
    }

    /**
     * @param  \App\Models\News  $news
     */
    public function updating(News $news)
    {
        $this->setSlug($news);
    }

    /**
     * Handle the News "deleted" event.
     *
     * @param  \App\Models\News  $news
     * @return void
     */
    public function deleted(News $news)
    {
        //
    }

    /**
     * Handle the News "restored" event.
     *
     * @param  \App\Models\News  $news
     * @return void
     */
    public function restored(News $news)
    {
        //
    }

    /**
     * Handle the News "force deleted" event.
     *
     * @param  \App\Models\News  $news
     * @return void
     */
    public function forceDeleted(News $news)
    {
        //
    }
}
