<?php
namespace Auth;

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

    /**
     * @return void
     */
    public function testGetMe()
    {
        User::factory()->create(["email"=>"test@gmail.com"]);

        $this->postJson("/api/auth/login", [
            "email"=>"test@gmail.com","password"=> '123456'
        ]);

        User::factory()->create(["email"=>"test@gmail.com"]);
        $this->getJson("/api/auth/me")
            ->assertStatus(200)
        ->assertJsonFragment(['email'=>"test@gmail.com"]);
    }

    /**
     * @return void
     */
    public function testCannotGetMeBecauseNotAuth()
    {
        User::factory()->create(["email"=>"test@gmail.com"]);

        $this->getJson("/api/auth/me")
            ->assertStatus(401);
    }

    /**
     * @return void
     */
    public function testLogout()
    {
        User::factory()->create(["email"=>"test@gmail.com"]);
        $this->postJson("/api/auth/login", [
            "email"=>"test@gmail.com","password"=> '123456'
        ])
            ->assertStatus(200);

        $this->postJson("/api/auth/logout")
            ->assertStatus(200);
    }

    /**
     * @return void
     */
    public function testCannotLogout()
    {
        User::factory()->create(["email"=>"test@gmail.com"]);

        $this->postJson("/api/auth/logout")
            ->assertStatus(401);
    }

    /**
     * @return void
     */
    public function testRefresh()
    {
        User::factory()->create(["email"=>"test@gmail.com"]);
        $this->postJson("/api/auth/login", [
            "email"=>"test@gmail.com","password"=> '123456'
        ])
            ->assertStatus(200);

        $this->postJson("/api/auth/refresh")
            ->assertStatus(200);
    }

    /**
     * @return void
     */
    public function testCannotRefresh()
    {
        User::factory()->create(["email"=>"test@gmail.com"]);

        $this->postJson("/api/auth/refresh")
            ->assertStatus(401);
    }
}
