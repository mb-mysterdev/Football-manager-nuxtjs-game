<?php

use App\Models\Division;
use App\Models\FootballMatch;
use App\Models\Team;
use App\Models\TeamUser;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PlayMatchFTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testPlayMatch(){
        $user = User::factory()->create([
            'name' => 'Toto','email'=> 'toto@gmail.com',
            'password'=> 'test',
            "year_in_progress"=> 2021,
            "start_year"=> 2021,
        ]);
        // create two division
        $division = Division::factory()->create(['division_name'=>'Ligue1']);
        $division2 = Division::factory()->create(['division_name'=>'Ligue2']);

        $myTeam = Team::factory()->create(['team_division'=>$division->division_id,'team_name'=>'Liverpool']);
        $teamLigue1 = Team::factory()->create(['team_division'=>$division->division_id,'team_name'=>'ESS']);
        $teamLigue2 = Team::factory()->create(['team_division'=>$division2->division_id,'team_name'=>'EST']);
        $team2Ligue2 = Team::factory()->create(['team_division'=>$division2->division_id,'team_name'=>'PSG']);

        TeamUser::factory()->createMany([
            [
                'tu_user'=>$user->id,
                'tu_division'=>$division->division_id,
                'tu_team'=>$myTeam->team_id,
                'tu_power'=>85
            ],
            [
                'tu_user'=>$user->id,
                'tu_division'=>$division->division_id,
                'tu_team'=>$teamLigue1->team_id,
                'tu_power'=>40
            ],
            [
                'tu_user'=>$user->id,
                'tu_division'=>$division2->division_id,
                'tu_team'=>$team2Ligue2->team_id,
                'tu_power'=>60
            ],
            [
                'tu_user'=>$user->id,
                'tu_division'=>$division2->division_id,
                'tu_team'=>$teamLigue2->team_id,
                'tu_power'=>75
            ],
        ]);

        FootballMatch::factory()->createMany([
            ['fm_first_club'=>$myTeam->team_id,'fm_second_club'=>$teamLigue1->team_id,
                'fm_user'=>$user->id,'fm_date'=> (new Carbon())->addDay(),
                'fm_division'=>$division->division_id],
            ['fm_first_club'=>$teamLigue2->team_id,'fm_second_club'=>$team2Ligue2->team_id,
                'fm_user'=>$user->id,'fm_date'=> new DateTime('2021-08-11 00:00:00'),
                'fm_division'=>$division2->division_id],
        ]);

        $this->getJson("/api/fm/play-match")
        ->assertStatus(200);

        // fm
        $fmTeamExemple = FootballMatch::where('fm_first_club',$teamLigue2->team_id)->get()->first();
        $this->assertNotNull($fmTeamExemple['fm_winner']);
        $this->assertNotNull($fmTeamExemple['fm_second_club']);
        $this->assertNotNull($fmTeamExemple['fm_first_club']);


        // state table team1
        $teamUser = TeamUser::where('tu_team',$teamLigue2->team_id)->get()->first();
        $this->assertNotNull($teamUser['tu_pts']);
        $this->assertNotNull($teamUser['tu_j']);
        $this->assertNotNull($teamUser['tu_g']);
        $this->assertNotNull($teamUser['tu_n']);
        $this->assertNotNull($teamUser['tu_p']);
        $this->assertNotNull($teamUser['tu_bp']);
        $this->assertNotNull($teamUser['tu_bc']);
        $this->assertNotNull($teamUser['tu_db']);

        // state table team1
        $team2User = TeamUser::where('tu_team',$team2Ligue2->team_id)->get()->first();
        $this->assertNotNull($team2User['tu_pts']);
        $this->assertNotNull($team2User['tu_j']);
        $this->assertNotNull($team2User['tu_g']);
        $this->assertNotNull($team2User['tu_n']);
        $this->assertNotNull($team2User['tu_p']);
        $this->assertNotNull($team2User['tu_bp']);
        $this->assertNotNull($team2User['tu_bc']);
        $this->assertNotNull($team2User['tu_db']);
    }
}
