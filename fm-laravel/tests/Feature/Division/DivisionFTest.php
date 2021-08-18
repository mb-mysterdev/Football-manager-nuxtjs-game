<?php

use App\Models\Country;
use App\Models\Division;
use App\Models\FootballMatch;
use App\Models\Team;
use App\Models\TeamUser;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DivisionFTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create(["email"=>"test@gmail.com"]);
    }


    public function testShowDefaultTeams(){
        $country = Country::factory()->create(['country_name' => 'France','country_id' => 1]);

        $division = Division::factory()->create(['division_country' => $country->country_id]);

        Team::factory(10)->create(['team_division'=>$division->division_id,'team_country'=> $country->country_id]);

        $response = $this->actingAs($this->user)->getJson("/api/division/$division->division_id")
            ->assertStatus(200);
        $this->assertEquals(10,count(json_decode($response->getContent())[0]->default_teams));
    }

    public function testShowUserDivisionTeams(){
        $country = Country::factory()->create(['country_name' => 'France','country_id' => 1]);
        $division = Division::factory()->create(['division_country' => $country->country_id]);
        $user = User::factory()->create([
            'name' => 'Toto','email'=> 'toto@gmail.com',
            'password'=> 'test',
            "year_in_progress"=> 2021,
            "start_year"=> 2021,
        ]);
        $myTeam = Team::factory()->create(['team_division'=>$division->division_id,'team_power'=> 85,'team_country'=> $country->country_id]);
        Team::factory()->create(['team_division'=>$division->division_id,'team_power'=> 85,'team_country'=> $country->country_id]);

        TeamUser::factory()->create([
                'tu_user'=>$user->id,
                'tu_division'=>$division->division_id,
                'tu_team'=>$myTeam->team_id,
                'tu_power'=>50
        ]);

        $response = $this->actingAs($this->user)->getJson("/api/division/$user->id/$division->division_id")
            ->assertStatus(200);
        $this->assertEquals(1,count(((array)json_decode($response->getContent()))['teams']));

        $this->assertDatabaseHas(Team::class,['team_power'=>85,'team_id'=>$myTeam->team_id]);
        $this->assertDatabaseHas(TeamUser::class,['tu_ranking'=>1,'tu_power'=>50,'tu_team'=>$myTeam->team_id]);
    }


}
