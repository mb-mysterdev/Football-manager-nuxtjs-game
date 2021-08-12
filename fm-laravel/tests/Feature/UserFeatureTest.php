<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserFeatureTest extends TestCase
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
            "year_in_progress"=> 2021,
            "start_year"=> 2021,
        ]);
        $this->getJson("/api/users/$user->id")
            ->assertStatus(200)
        ->assertJsonFragment($user->toArray());
    }

    public function testCreateUser(){
        $this->postJson("/api/users",
            ['name' => 'Toto','email'=> 'toto@gmail.com',
            'password'=> 'test',
            "year_in_progress"=> 2021,
        "start_year"=> 2021,
        "team"=> null])
        ->assertStatus(201);
        $this->assertDatabaseHas('users',['name'=>'Toto']);
    }
}
