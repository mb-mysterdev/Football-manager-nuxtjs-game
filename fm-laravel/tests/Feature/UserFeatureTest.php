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
        $this->getJson("/api/users/$user->user_id")
            ->assertStatus(200)
        ->assertJson($user->toArray());
    }

    public function testCreateUser(){
        $this->postJson("/api/users", ['user_name' => 'Toto','user_mail'=> 'toto@gmail.com',
            'user_mdp'=> 'test'])
        ->assertStatus(201);
        $this->assertDatabaseHas('users',['user_name'=>'Toto']);
    }
}
