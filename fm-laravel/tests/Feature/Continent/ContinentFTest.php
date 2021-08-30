<?php
namespace Continent;

use App\Models\Continent;
use App\Models\Country;
use App\Models\Division;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContinentFTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create(["email"=>"test@gmail.com"]);
    }

    public function testGet5Continents(){
        Continent::factory()->createMany(
            [
                ['continent_name'=>'Afrique'],
                ['continent_name'=>'Europe'],
                ['continent_name'=>'Amérique'],
                ['continent_name'=>'Océanie'],
                ['continent_name'=>'Asie'],
            ]);
        $this->actingAs($this->user)->getJson("/api/continents")
            ->assertStatus(200)
        ->assertJsonCount(5);
    }
}
