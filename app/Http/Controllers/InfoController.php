<?php

namespace App\Http\Controllers;

use App\Queries\QueryBuilderNews;

class InfoController extends Controller
{
    public function index(QueryBuilderNews $news)
    {
        return view('info.index', [
            'newsList' => $news->getNews(20),
        ]);
    }
}
