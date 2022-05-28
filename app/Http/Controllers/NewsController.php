<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(string $catSlug)
    {

    }

    public function show(string $catSlug, string $newsSlug)
    {
        $news = News::where('slug', $newsSlug)->first();

        return view('news.show', [
            'news' => $news,
        ]);
    }
}
