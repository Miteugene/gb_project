<?php

namespace App\Services;

use App\Queries\QueryBuilderCategories;
use App\Queries\QueryBuilderNews;
use App\Services\Contract\Parser;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService implements Parser
{
    use NewsFormatService;

    protected string $link;
    protected $queryBuilderNews;
    protected $queryBuilderCategories;

    public function __construct()
    {
        $this->queryBuilderNews = new QueryBuilderNews();
        $this->queryBuilderCategories = new QueryBuilderCategories();
    }

    public function setLink(string $link): Parser
    {
        $this->link = $link;

        return $this;
    }

    public function import()
    {
        $data = $this->parse();
        $category = $this->getCategory($data);
        $this->addNews($data['news'], $category->id, $data['title']);
    }

    private function getCategory($data)
    {
        $categoryData = [
            'name'        => $data['title'],
            'description' => $data['description'],
        ];
        $category = $this->queryBuilderCategories->addCategoryByExternalSource($categoryData);
        return $category;
    }

    private function addNews($dataNews, $categoryId, $author)
    {
        $newsDataList = $this->formatImportNews($dataNews, $categoryId, $author);
        foreach ($newsDataList as $newsData) {
            $this->queryBuilderNews->addNewsByExternalSource($newsData);
        }
    }

    private function parse()
    {
        $xml = XmlParser::load($this->link);

        $data = $xml->parse([
            'title' => [
                'uses' => 'channel.title',
            ],
            'link' => [
                'uses' => 'channel.link',
            ],
            'description' => [
                'uses' => 'channel.description',
            ],
            'image' => [
                'uses' => 'channel.image.url',
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]',
            ],
        ]);

        return $data;
    }
}
