<?php
namespace Continent;

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

    public function testGetAllCountries(){
        Country::factory(10)->create();
        $this->actingAs($this->user)->getJson("/api/countries")
            ->assertStatus(200)
            ->assertJsonCount(10);
    }

    public function testGetCountryWithDivisions(){
        $country = Country::factory()->create(['country_name' => 'France','country_id' => 1]);
        Division::factory()->create(['division_name'=>'Ligue1','division_country' => $country->country_id]);

        $response = $this->actingAs($this->user)->getJson("/api/countries/France")
            ->assertStatus(200);

        $this->assertEquals(json_decode($response->getContent())[0]->divisions[0]->division_name,'Ligue1');
        $this->assertDatabaseMissing(Country::class,['country_picture'=>'']);
    }
}
