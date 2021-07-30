<?php

use App\Models\User;
use Laravel\Lumen\Testing\DatabaseMigrations;

class UserFeatureTest extends TestCase
{
    use DatabaseMigrations;

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
        $response = $this->json('GET',"/api/users/$user->user_id");
        $response->assertResponseOk();
        $response->seeJsonEquals($user->toArray());
    }

    public function testCreateUser(){
        $response = $this->json('POST',"/api/users", ['user_name' => 'Toto','user_mail'=> 'toto@gmail.com',
            'user_mdp'=> 'test']);
        $response->assertResponseOk();
        $response->seeJsonEquals(['dd']);

    }
}
