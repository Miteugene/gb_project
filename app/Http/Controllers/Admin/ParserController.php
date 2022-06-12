<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\JobNewsParsing;
use App\Queries\QueryBuilderUserSourceOrder;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    public function __invoke(Request $request, QueryBuilderUserSourceOrder $queryBuilderSources)
    {
        $sources = $queryBuilderSources->getSourcesUrl();
        foreach ($sources as $source) {
            dispatch(new JobNewsParsing($source));
        }

        return back()->with('success', __("Новости добавлены в очередь"));
    }
}
