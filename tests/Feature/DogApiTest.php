<?php

namespace Tests\Feature;

use App\Models\Dog;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\withFaker;
use Tests\TestCase;

class DogApiTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_api_route_get_all_dogs()
    {   
        //Given
        $dogs = Dog::factory()->count(2)->create();

        //When
        $response = $this->json('GET','/api/dogs');

        //Then
        $response->assertStatus(200)
            ->assertJsonCount(2)
            ->assertExactJson($dogs->toArray());      
    }

    public function test_get_only_one_dog()
    {
        //Given
        $dogs = Dog::factory()->count(2)->create();

        //When
        $response = $this->json('GET', '/api/dogs/1');

        //Then
        $response->assertStatus(200);
    }

    public function test_create_a_dog()
    {
        $data = [
            'name' => 'Doggy',
            'breed' => 'Raza',
            'img' => 'new url'
        ];

        $response = $this->json('POST' , '/api/dogs' , $data);

        $response->assertStatus(201);

    }

    public function test_dog_delete()
    {
        $dog = Dog::factory()->count(2)->create();

        $response = $this->deleteJson('/api/dogs/1');
        // $response = $this->json('DELETE' , '/api/dogs/1');

        $response->assertStatus(200);

    }

    public function test_dog_update()
    {
        $dogs = Dog::factory()->count(2)->create();

        $data = [
            'name'  => 'Cherko',
            'breed' => 'Cocker spaniel',
            'img'   => 'new img'
        ];

        $response = $this->putJson('/api/dogs/1', $data);

        $response->assertStatus(200);


        
;

    }


}
