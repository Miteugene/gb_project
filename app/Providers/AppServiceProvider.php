<?php

namespace App\Providers;

use App\Queries\QueryBuilder;
use App\Queries\QueryBuilderCategories;
use App\Queries\QueryBuilderNews;
use App\Services\Contract\Parser;
use App\Services\Contract\Social;
use App\Services\Contract\Uploader;
use App\Services\ParserService;
use App\Services\SocialService;
use App\Services\UploadService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(QueryBuilder::class, QueryBuilderNews::class);
        $this->app->bind(QueryBuilder::class, QueryBuilderCategories::class);

        $this->app->bind(Parser::class, ParserService::class);
        $this->app->bind(Social::class, SocialService::class);

        $this->app->bind(Uploader::class, UploadService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();
    }
}
