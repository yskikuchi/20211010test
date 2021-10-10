<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Exercise;

class ExerciseControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_exercise()
    {
        $item=Exercise::factory()->create();
        $response = $this->get('/api/v1/exercise');
        $response->assertStatus(200);
        $response->assertJsonFragment([
            'name' => $item->name,
            'email'=> $item->email,
            'profile'=> $item->profile,
        ]);
    }

    public function test_store_exercise()
    {
        $data = [
            "name"=>"aaa",
            "email"=>"aaa@example.com",
            "profile"=>"abcdefg"
        ];
        $response = $this->post('/api/v1/exercise', $data);
        $response->assertStatus(201);
        $response->assertJsonFragment($data);
        $this->assertDatabaseHas('exercises', $data);
    }

    public function test_show_exercise()
    {
        $item = Exercise::factory()->create();
        $response = $this->get('/api/v1/exercise/' . $item->id);
        $response->assertStatus(200);
        $response->assertJsonFragment([
            'name' => $item->name,
            'email' => $item->email,
            'profile' => $item->profile
        ]);
    }

    public function test_update_exercise()
    {
        $item = Exercise::factory()->create();
        $data = [
            "name"=>"aaa_update",
            "email"=>"aaa_update@example.com",
            "profile"=>"abcdefg_update"
        ];
        $response = $this->put('/api/v1/exercise/' . $item->id, $data);
        $response->assertStatus(200);
        $this->assertDatabaseHas('exercises', $data);
    }
    public function test_destroy_exercise()
    {
        $item = Exercise::factory()->create();
        $response = $this->delete('/api/v1/exercise/' . $item->id);
        $response->assertStatus(200);
        $this->assertDeleted($item);
    }

}
