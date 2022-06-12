<?php

namespace App\Queries;

use App\Models\UserSourceOrder;
use Illuminate\Contracts\Database\Eloquent\Builder;

class QueryBuilderUserSourceOrder implements QueryBuilder
{
    public function getBuilder(): Builder
    {
        return UserSourceOrder::query();
    }

    public function getSourcesUrl()
    {
        return $this->getBuilder()
            ->select(['*'])
            ->get()
            ->pluck('source');
    }
}
