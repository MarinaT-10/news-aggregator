<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UploadingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        \DB::table('uploading')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];
        for ($i = 0; $i < 10; $i++){
            $data[] = [
                'author' => \fake()->userName(),
                'email' => \fake()->email(),
                'phone' => \fake()->phoneNumber(),
                'message' => \fake()->text(100),
                'created_at' => \now(),
                'updated_at' => \now(),
            ];
        }
        return $data;
    }

}
