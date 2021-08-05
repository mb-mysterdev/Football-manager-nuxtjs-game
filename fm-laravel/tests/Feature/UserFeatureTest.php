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
        $user = User::factory()->create();
        $this->getJson("/api/users/$user->id")
            ->assertStatus(200)
        ->assertJson($user->toArray());
    }

    public function testCreateUser(){
        $this->postJson("/api/users", ['name' => 'Toto','email'=> 'toto@gmail.com',
            'password'=> 'test'])
        ->assertStatus(201);
        $this->assertDatabaseHas('users',['name'=>'Toto']);
    }
}
