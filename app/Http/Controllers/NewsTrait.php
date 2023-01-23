<?php

declare(strict_types=1);

namespace App\Http\Controllers;

trait NewsTrait
{

    public function getNews(int $id = null, int $category_id = null) : array
    {
        $news = [];
        $quantityNews = 5;
        if ($id === null){
            for ($i = 1; $i <= $quantityNews; $i++){
                $news [$i] = [
                    'id' => $i,
                    'category_id' =>  \fake()->numberBetween(1, 5),
                    'title'  => \fake()->jobTitle(),
                    'description' => \fake()->text(100),
                    'author' => \fake()->userName(),
                    'created_at' => \now()->format("d-m-Y H:i")
                ];
            }
            return $news;
        }
        return [
            'id' => $id,
            'category_id' =>  \fake()->numberBetween(1, 5),
            'title'  => \fake()->jobTitle(),
            'description' => \fake()->text(100),
            'author' => \fake()->userName(),
            'created_at' => \now()->format("d-m-Y H:i")
        ];
    }

}
