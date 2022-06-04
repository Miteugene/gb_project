<?php

namespace Tests\Browser;

use App\Models\News;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AdminNewsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function addNews()
    {
        $news = News::factory()->create();

        $this->browse(function (Browser $browser) use($news) {
            $browser->visit('/admin/news/create')
                ->select('category_id', $news->category_id)
                ->select('title', $news->title)
                ->press('Сохранить')
                ->assertRouteIs('admin.news.store');
        });
    }

    public function updateNews()
    {
        $news = News::factory()->create();

        $this->browse(function (Browser $browser) use($news) {
            $browser->visit('admin/news/'.$news->id.'/edit')
                ->select('category_id', $news->category_id)
                ->select('title', $news->title)
                ->press('Сохранить')
                ->assertRouteIs('admin.news.update');
        });
    }
}
