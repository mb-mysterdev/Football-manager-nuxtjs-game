<?php

use App\Models\Division;
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
        $division = Division::factory()->create();
        $division2 = Division::factory()->create();
        $division3 = Division::factory()->create();

        $team = Team::factory()->create(['team_division'=>$division->division_id,'team_budget'=>50,'team_power'=>80]);
        Team::factory()->create(['team_division'=>$division2->division_id,'team_budget'=>50,'team_power'=>80]);
        Team::factory()->create(['team_division'=>$division3->division_id,'team_budget'=>50,'team_power'=>80]);

        $user = User::factory()->create();

        $this->postJson("/api/team-user", ['tu_team'=>$team->team_id,'tu_user'=>$user->id,'tu_division'=>$division->division_id])
        ->assertStatus(200);
        $this->assertDatabaseHas(\App\Models\TeamUser::class,['tu_team'=>$team->team_id,'tu_user'=>$user->id,'tu_division'=>$division->division_id]);
        $this->assertDatabaseCount(\App\Models\TeamUser::class,3);
    }
}
