<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthFTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @return void
     */
    public function testRegister()
    {
        $this->postJson("/api/auth/register", [
            "name"=>"test","email"=>"test@gmail.com","password"=>"test1234"
        ])
            ->assertStatus(201);

        $this->assertDatabaseHas('users',['name'=>'test']);
    }
    /**
     * @return void
     */
    public function testCannotRegisterBecauseAShortName()
    {
        $this->postJson("/api/auth/register", [
            "name"=>"t","email"=>"test@gmail.com","password"=>"test1234"
        ])
            ->assertStatus(400)
        ->assertJsonFragment(["{\"name\":[\"The name must be between 2 and 100 characters.\"]}"]);
    }

    /**
     * @return void
     */
    public function testLogin()
    {
        User::factory()->create(["email"=>"test@gmail.com"]);
        $this->postJson("/api/auth/login", [
            "email"=>"test@gmail.com","password"=> '123456'
        ])
            ->assertStatus(200);
    }

    /**
     * @return void
     */
    public function testCannotLoginBecauseIsNotAGoodPassword()
    {
        User::factory()->create(["email"=>"test@gmail.com"]);
        $this->postJson("/api/auth/login", [
            "email"=>"test@gmail.com","password"=> '1234567'
        ])
            ->assertStatus(401);
    }
}
