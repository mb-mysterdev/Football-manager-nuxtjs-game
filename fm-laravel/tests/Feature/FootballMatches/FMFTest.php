<?php

use App\Models\Division;
use App\Models\FootballMatch;
use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FMFTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testGetMatchOfMyDivision(){
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

        FootballMatch::factory()->createMany([
            ['fm_first_club'=>$myTeam->team_id,'fm_second_club'=>$teamLigue1->team_id,'fm_user'=>$user->id,'fm_date'=> new DateTime()],
            ['fm_first_club'=>$teamLigue2->team_id,'fm_second_club'=>$team2Ligue2->team_id,'fm_user'=>$user->id,'fm_date'=> new DateTime()],
        ]);

        $this->getJson("/api/fm/$user->id/".Date('Y')."/$division->division_id")
        ->assertStatus(200)
        ->assertJsonCount(1)
        ->assertJsonFragment(['team_name'=>'Liverpool'])
        ->assertJsonMissing(['team_name'=>'PSG']);
    }
}
