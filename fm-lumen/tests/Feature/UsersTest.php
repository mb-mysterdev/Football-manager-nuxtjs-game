<?php

use App\Models\User;
use Laravel\Lumen\Testing\DatabaseMigrations;

class UsersTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @return void
     */
    public function getUserById()
    {
        $user = User::factory()->create();
        $response = $this->json('GET',"/api/users/$user->user_id");
        $response->assertResponseOk();
        $response->seeJsonEquals($user->toArray());
    }
}
