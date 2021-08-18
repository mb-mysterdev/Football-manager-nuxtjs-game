<?php

use App\Models\Country;
use App\Models\Division;
use App\Models\FootballMatch;
use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TeamUserFTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testGetAllTeams(){
        $country = Country::factory()->create(['country_name' => 'France','country_id' => 1]);

        $division = Division::factory()->create(['division_name'=>'Ligue1','division_country' => $country->country_id]);
        $division2 = Division::factory()->create(['division_name'=>'Ligue2','division_country' => $country->country_id]);
        $division3 = Division::factory()->create(['division_name'=>'Ligue3','division_country' => $country->country_id]);

        $team = Team::factory()->create(['team_name'=>'PSG','team_division'=>$division->division_id,'team_budget'=>50,'team_power'=>80,'team_country'=> $country->country_id]);
        Team::factory()->create(['team_name'=>'OM','team_division'=>$division->division_id,'team_budget'=>50,'team_power'=>40,'team_country'=> $country->country_id]);
        Team::factory()->create(['team_name'=>'NICE','team_division'=>$division->division_id,'team_budget'=>50,'team_power'=>40,'team_country'=> $country->country_id]);

        Team::factory(4)->create(['team_division'=>$division2->division_id,'team_budget'=>50,'team_power'=>80,'team_country'=> $country->country_id]);
        Team::factory(3)->create(['team_division'=>$division3->division_id,'team_budget'=>50,'team_power'=>80,'team_country'=> $country->country_id]);

        $user = User::factory()->create();

        $this->postJson("/api/create-match-team-user", ['tu_team'=>$team->team_id,'tu_user'=>$user->id,'tu_division'=>$division->division_id])
            ->assertStatus(200);
        $this->assertDatabaseHas(\App\Models\TeamUser::class,['tu_team'=>$team->team_id,'tu_user'=>$user->id,'tu_division'=>$division->division_id]);
        $this->assertDatabaseCount(\App\Models\TeamUser::class,10);
        // Nb of match
        $this->assertCount(6,FootballMatch::where('fm_division',$division->division_id)->get()->all());
        $this->assertCount(12,FootballMatch::where('fm_division',$division2->division_id)->get()->all());
        $this->assertCount(6,FootballMatch::where('fm_division',$division3->division_id)->get()->all());

        $this->assertDatabaseCount(\App\Models\FootballMatch::class,24);
    }
}
