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
                    'title' => "Категория #{$i}",
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
                        'title'     => "Заголовок новости из категории: #{$catId}, id новости: #{$i}",
                        'author'    => substr(md5("{$catId}/{$i}"), 0, 5),
                        'image'     => "https://leonardo.osnova.io/0c6392dd-2c8a-5fe5-ad3e-52f13985ac30/-/preview/1900/-/format/webp/",
                        'text'      => "Текст новости из категории: #{$catId}, id новости: #{$i}",
                        'date'      => now('Europe/Moscow'),
                    ];
                }
        }

        if ( $id && array_key_exists($id, $newsMap) )
            return $newsMap[$id];

        return $newsMap;
    }
}
