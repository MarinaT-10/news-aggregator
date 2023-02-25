<?php

declare(strict_types=1);

namespace App\Services;

use App\Enums\NewsStatus;
use App\Models\News;
use App\Services\Contracts\Parser;
use Illuminate\Support\Facades\Storage;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService implements Parser
{
    private string $link;

    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getParseData(): array
    {
        $xml = XmlParser::load($this->link);

        $data = $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'author' => [
                'uses' => 'channel.author'
            ],
            'news' => [
                'uses' => 'channel.item[title,author,description,pubDate]'
            ],
        ]);
        return $data;
    }

    public function saveParseDataInFile(string $link): void
    {
        $data = $this->getParseData($link);

           $e = \explode("/", $this->link);
            $fileName = end($e);
            $jsonEncode = json_encode($data);

            Storage::append('news/' . $fileName, $jsonEncode);
        }

    public function saveParseData(string $link): void
    {
        $data = $this->getParseData($link);

        foreach ($data["news"] as $news) {
            $item= News::create([
                'title' => $news['title'],
                'author' => $news['author'],
                'description' => $news['description'],
                'created_at' => $news['pubDate'],
                'status' => NewsStatus::ACTIVE,
            ]);
        }
    }
}

