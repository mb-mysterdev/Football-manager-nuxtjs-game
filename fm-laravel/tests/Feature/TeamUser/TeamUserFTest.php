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
        $team = Team::factory()->create(['team_division'=>$division->division_id]);
        $user = User::factory()->create();

        $this->postJson("/api/team-user", ['tu_team'=>$team->team_id,'tu_user'=>$user->id,'tu_division'=>$division->division_id])
            ->dump()
        ->assertStatus(200);
        $this->assertDatabaseHas('team_user',['tu_team'=>$team->team_id,'tu_user'=>$user->id,'tu_division'=>$division->division_id]);
    }
}
