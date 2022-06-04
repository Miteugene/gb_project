<?php

namespace App\Queries;

use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class QueryBuilderUsers implements QueryBuilder
{
    public function getBuilder(): Builder
    {
        return User::query();
    }

    public function getUsers(int $perPage = 10): LengthAwarePaginator
    {
        return $this->getBuilder()
            ->select(['*'])
            ->paginate($perPage);
    }
}
