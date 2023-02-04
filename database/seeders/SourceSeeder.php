<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        \DB::table('sources')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];
        for ($i = 0; $i < 10; $i++){
            $data[] = [
                'title' => \fake()->jobTitle(),
                'url' => \fake()->url(),
                'news_id' => \fake()->numberBetween(1, 10)
            ];
        }
        return $data;
    }
}
