<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Queries\QueryBuilderNews;
use App\Services\Contract\Parser;
use App\Services\NewsFormatService;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    public function __invoke(Request $request, Parser $parser, QueryBuilderNews $newsQuery)
    {
        $data = $parser->setLink('https://news.yandex.ru/movies.rss')->parse();

        $news = NewsFormatService::format($data['news']);

        $newsQuery->addNews($news);
    }

}
