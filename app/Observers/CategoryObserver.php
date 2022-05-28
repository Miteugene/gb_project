<?php

namespace App\Observers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Str;

class CategoryObserver
{
    /**
     * Handle the Category "created" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function created(Category $category)
    {
        //
    }

    /**
     * @param  \App\Models\Category  $category
     */
    public function creating(Category $category)
    {
        $this->setSlug($category);
    }

    /**
     * @param  \App\Models\Category  $category
     */
    protected function setSlug(Category $category)
    {
        if (empty($category->slug)) {
            $category->slug = Str::slug($category->name);
        }
    }

    /**
     * Handle the Category "updated" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function updated(Category $category)
    {
        //
    }

    /**
     * @param  \App\Models\Category  $category
     */
    public function updating(Category $category)
    {
        $this->setSlug($category);
    }

    /**
     * Handle the Category "deleted" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function deleted(Category $category)
    {
        //
    }

    /**
     * Handle the Category "restored" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function restored(Category $category)
    {
        //
    }

    /**
     * Handle the Category "force deleted" event.
     *
     * @param  \App\Models\Category  $category
     * @return void
     */
    public function forceDeleted(Category $category)
    {
        //
    }
}
