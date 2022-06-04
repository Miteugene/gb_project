<?php

namespace App\Queries;

use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Database\Eloquent\Builder;

class QueryBuilderCategories implements QueryBuilder
{

    public function getBuilder(): Builder
    {
        return Category::query();
    }

    public function getCategories(int $perPage = 10): LengthAwarePaginator
    {
        return $this->getBuilder()
            ->select(['id', 'name', 'created_at'])
            ->withCount('news')
            ->orderBy('name')
            ->paginate($perPage);
    }

    public function getCategoryById(int $id)
    {
        return Category::select(['id', 'name', 'description', 'created_at'])
            ->findOrFail($id);
    }
}
