<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserFTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @return void
     */
    public function testGetUserById()
    {
        $user = User::factory()->create([
            'name' => 'Toto','email'=> 'toto@gmail.com',
            'password'=> 'test',
            "year_in_progress"=> Date('Y'),
            "start_year"=> Date('Y'),
        ]);
        $this->getJson("/api/users/$user->id")
            ->assertStatus(200)
        ->assertJsonFragment($user->toArray());
    }

    public function testCreateUser(){
        $this->postJson("/api/users",
            ['name' => 'Toto','email'=> 'toto@gmail.com',
            'password'=> 'test',
            "year_in_progress"=> Date('Y'),
        "start_year"=> Date('Y'),
        "team"=> null])
        ->assertStatus(201);
        $this->assertDatabaseHas('users',['name'=>'Toto']);
    }
}
