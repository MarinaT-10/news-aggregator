<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UploadingControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexSuccessStatus(): void
    {
        $response = $this->get(route('uploading.index'));

        $response->assertStatus(200);
    }

    public function testCreateSuccessStatus(): void
    {
        $response = $this->get(route('uploading.create'));

        $response->assertStatus(200);
    }

    public function testCreateSaveSuccessData(): void
    {
        $data =[
            'author' => \fake()->userName(),
            'email' => \fake()->email(),
            'phone' => \fake()->phoneNumber(),
            'manual' => \fake()->text(100),

        ];
        $response = $this->post(route('uploading.store'), $data);

        $response->assertStatus(200)
            ->json($data);
    }

}
