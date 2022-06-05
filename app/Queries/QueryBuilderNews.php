<?php

namespace App\Queries;

use App\Models\News;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class QueryBuilderNews implements QueryBuilder
{

    public function getBuilder(): Builder
    {
        return News::query();
    }

    public function getNews(int $perPage = 10): LengthAwarePaginator
    {
        return $this->getBuilder()
            ->select(['*'])
            ->with('category')
            ->orderByDesc('updated_at')
            ->paginate($perPage);
    }

    public function addNews(array $newsList)
    {
        return $this->getBuilder()
            ->insert($newsList);
    }
}
