<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categoriesList = $this->getCategories();

        return view('categories.index', [
            'categoriesList' => $categoriesList,
        ]);
    }
}
