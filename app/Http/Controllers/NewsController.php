<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(int $catId)
    {
        $newsMap = $this->getNews();
        $newsList = [];
        foreach ($newsMap as $newsObj)
            if ( $newsObj['catId'] == $catId )
                $newsList[] = $newsObj;

        return view('news/index', [
            'newsList' => $newsList,
        ]);
    }

    public function show(int $catId, int $id)
    {
        $newsList = $this->getNews();

        return view('news/show', [
            'news' => $newsList[$id],
        ]);
    }
}
