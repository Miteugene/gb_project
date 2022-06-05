<?php

namespace App\Services;

use Illuminate\Support\Str;

class NewsFormatService
{
    public static function format(array $newsList): array
    {
        // Временное топорное решение
        return collect($newsList)->map(function ($value) {
            return [
                'category_id'   => 1,
                'title'         => $value['title'],
                'text'          => $value['description'],
                'author'        => 'yandex',
                'slug'          => Str::slug('yandex-'.$value['title']),
            ];
        })->toArray();
    }

}
