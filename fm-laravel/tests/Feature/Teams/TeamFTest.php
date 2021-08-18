<?php

use App\Models\Country;
use App\Models\Division;
use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TeamFTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create(["email"=>"test@gmail.com"]);
    }

    public function testGetAllTeams(){
        $country = Country::factory()->create(['country_name' => 'France','country_id' => 1]);

        $division = Division::factory()->create(['division_name'=>'Ligue1','division_country' => $country->country_id]);

        Team::factory(3)->create(['team_division'=>$division->division_id,'team_country'=> $country->country_id]);

        $this->actingAs($this->user)->getJson("/api/teams")
            ->assertStatus(200)
        ->assertJsonCount(3);
    }
}
