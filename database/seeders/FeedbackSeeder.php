<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\FeedbackStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        \DB::table('feedback')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];
        for ($i = 0; $i < 10; $i++){
            $data[] = [
                'author' => \fake()->userName(),
                'message' => \fake()->text(100),
                'status' => FeedbackStatus::RECEIVED->value,
                'created_at' => \now(),
                'updated_at' => \now(),
                'email' => \fake()->email(),
            ];
        }
        return $data;
    }
}
