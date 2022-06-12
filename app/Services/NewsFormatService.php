<?php

namespace App\Services;

use Illuminate\Support\Str;

trait NewsFormatService
{
    public static function formatImportNews(array $newsList, $categotyId, $author = ''): array
    {
        return collect($newsList)->map(function ($value) use($categotyId, $author) {
            return [
                'category_id'   => $categotyId,
                'title'         => $value['title'],
                'source_url'    => $value['link'],
                'text'          => $value['description'],
                'author'        => $author,
            ];
        })->toArray();
    }

}
