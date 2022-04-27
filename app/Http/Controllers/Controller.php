<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getCategories(): array
    {
        static $catMap  = null;

        if ( !$catMap )
            for ($i = 1; $i <= 5; $i++)
                $catMap[$i] = [
                    'catId' => $i,
                    'title' => "cat name {$i}",
                ];

        return $catMap;
    }

    public function getNews(int $id = null): array
    {
        static $newsMap = null;

        if ( !$newsMap ) {
            $catMap = $this->getCategories();
            $newsId = 0;
            foreach ( $catMap as $catId => $catObj )
                for ($i = 1; $i <= 5; $i++) {
                    $newsId++;
                    $newsMap[$newsId] = [
                        'id'        => $newsId,
                        'catId'     => $catId,
                        'title'     => "test title {$catId}/{$i}",
                        'author'    => "test author {$catId}/{$i}",
                        'image'     => "test image {$catId}/{$i}",
                        'text'      => "test text {$catId}/{$i}",
                        'date'      => now('Europe/Moscow'),
                    ];
                }
        }

        if ( $id && array_key_exists($id, $newsMap) )
            return $newsMap[$id];

        return $newsMap;
    }
}
