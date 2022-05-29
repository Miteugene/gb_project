<?php

namespace Tests\Browser;

use App\Models\Category;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AdminCategoryTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function addNews()
    {
        $category = Category::factory()->create();

        $this->browse(function (Browser $browser) use($category) {
            $browser->visit('/admin/category/create')
                ->select('name', $category->name)
                ->select('description', $category->description)
                ->press('Сохранить')
                ->assertRouteIs('admin.category.update');
        });
    }

    public function updateNews()
    {
        $category = Category::factory()->create();

        $this->browse(function (Browser $browser) use($category) {
            $browser->visit('admin/category/'.$category->id.'/edit')
                ->select('name', $category->name)
                ->select('description', $category->description)
                ->press('Сохранить')
                ->assertRouteIs('admin.category.update');
        });
    }
}
