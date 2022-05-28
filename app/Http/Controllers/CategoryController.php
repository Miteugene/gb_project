<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categoriesList = Category::select(['id', 'name', 'slug', 'description'])
            ->orderBy('name')
            ->get();

        return view('categories.index', [
            'categoriesList' => $categoriesList,
        ]);
    }

    public function show(string $catSlug)
    {
        $newsList = Category::where('slug', $catSlug)->first()->news;

        return view('news.index', [
            'newsList' => $newsList,
        ]);
    }
}
