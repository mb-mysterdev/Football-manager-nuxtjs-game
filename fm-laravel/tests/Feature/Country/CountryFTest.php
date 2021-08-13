<?php

use App\Models\Country;
use App\Models\Division;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CountryFTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testGetAllCountries(){
        Country::factory(10)->create();
        $this->getJson("/api/countries")
            ->assertStatus(200)
            ->assertJsonCount(10);
    }

    public function testGetCountryWithDivisions(){
        $country = Country::factory()->create(['country_name' => 'France','country_id' => 1]);
        Division::factory()->create(['division_name'=>'Ligue1','division_country' => $country->country_id]);

        $response = $this->getJson("/api/countries/France")
            ->assertStatus(200);

        $this->assertEquals(json_decode($response->getContent())[0]->divisions[0]->division_name,'Ligue1');
        $this->assertDatabaseMissing(Country::class,['country_picture'=>'']);
    }
}
