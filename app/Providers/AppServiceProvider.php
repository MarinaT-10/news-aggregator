<?php

declare(strict_types=1);

namespace App\Providers;

use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\FeedbackQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use App\QueryBuilders\QueryBuilder;
use App\QueryBuilders\SourcesQueryBuilder;
use App\Services\Contracts\Parser;
use App\Services\Contracts\Social;
use App\Services\Contracts\Upload;
use App\Services\ParserService;
use App\Services\SocialService;
use App\Services\UploadService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(QueryBuilder::class, FeedbackQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, CategoriesQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, NewsQueryBuilder::class);
        $this->app->bind(QueryBuilder::class, SourcesQueryBuilder::class);

        //services
        $this->app->bind(Parser::class, ParserService::class);
        $this->app->bind(Social::class, SocialService::class);
        $this->app->bind(Upload::class, UploadService::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        Paginator::useBootstrapFour();
    }
}
