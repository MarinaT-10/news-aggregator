<?php

declare(strict_types=1);

namespace App\Http\Controllers;

trait CategoriesTrait
{
    public function getCategory(int $id = null): array
    {
        $categories = [];
        $quantityCategories = 5;
        if ($id === null) {
            for ($i = 1; $i <= $quantityCategories; $i++) {
                $categories [$i] = [
                    'id' => $i,
                    'name' => \fake()->text(7)
                ];
            }
            return $categories;
        }
        return [
            'id' => $id,
            'name' => \fake()->text(7),
            'news' => $this->getNews()
        ];

    }



}
