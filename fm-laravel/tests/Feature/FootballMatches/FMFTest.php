<?php

use App\Models\Country;
use App\Models\Division;
use App\Models\FootballMatch;
use App\Models\Team;
use App\Models\TeamUser;
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
        $country = Country::factory()->create(['country_name' => 'France','country_id' => 1]);

        // create two division
        $division = Division::factory()->create(['division_name'=>'Ligue1','division_country' => $country->country_id]);
        $division2 = Division::factory()->create(['division_name'=>'Ligue2','division_country' => $country->country_id]);

        $myTeam = Team::factory()->create(['team_division'=>$division->division_id,'team_name'=>'Liverpool','team_country'=> $country->country_id]);
        $teamLigue1 = Team::factory()->create(['team_division'=>$division->division_id,'team_name'=>'ESS','team_country'=> $country->country_id]);
        $teamLigue2 = Team::factory()->create(['team_division'=>$division2->division_id,'team_name'=>'EST','team_country'=> $country->country_id]);
        $team2Ligue2 = Team::factory()->create(['team_division'=>$division2->division_id,'team_name'=>'PSG','team_country'=> $country->country_id]);

        FootballMatch::factory()->createMany([
            ['fm_first_club'=>$myTeam->team_id,'fm_second_club'=>$teamLigue1->team_id,
                'fm_user'=>$user->id,'fm_date'=> new DateTime(),
                'fm_division'=>$division->division_id],
            ['fm_first_club'=>$teamLigue2->team_id,'fm_second_club'=>$team2Ligue2->team_id,
                'fm_user'=>$user->id,'fm_date'=> new DateTime(),
                'fm_division'=>$division2->division_id],
        ]);

        $this->getJson("/api/fm/$user->id/".Date('Y')."/$division->division_id")
        ->assertStatus(200)
        ->assertJsonCount(1)
        ->assertJsonFragment(['team_name'=>'Liverpool'])
        ->assertJsonMissing(['team_name'=>'PSG']);
    }

    public function testGetNextMatch(){
        $user = User::factory()->create([
            'name' => 'Toto','email'=> 'toto@gmail.com',
            'password'=> 'test',
            "year_in_progress"=> Date('Y'),
            "start_year"=> Date('Y'),
        ]);

        $country = Country::factory()->create(['country_name' => 'France','country_id' => 1]);

        // create two division
        $division = Division::factory()->create(['division_name'=>'Ligue1','division_country' => $country->country_id]);
        $division2 = Division::factory()->create(['division_name'=>'Ligue2','division_country' => $country->country_id]);

        $myTeam = Team::factory()->create(['team_division'=>$division->division_id,'team_name'=>'Liverpool','team_country'=> $country->country_id]);
        $teamLigue1 = Team::factory()->create(['team_division'=>$division->division_id,'team_name'=>'Man United','team_country'=> $country->country_id]);
        $teamLigue2 = Team::factory()->create(['team_division'=>$division2->division_id,'team_name'=>'ESS','team_country'=> $country->country_id]);

        TeamUser::factory()->create([
            'tu_user'=>$user->id,
            'tu_division'=>$division->division_id,
            'tu_team'=>$myTeam->team_id,
            'tu_power'=>50,
            'tu_year' =>Date('Y'),
            'tu_active' => 1,
            'tu_taken' =>1
        ]);

        TeamUser::factory()->create([
            'tu_user'=>$user->id,
            'tu_division'=>$division->division_id,
            'tu_team'=>$teamLigue1->team_id,
            'tu_power'=>50,
            'tu_year' =>Date('Y'),
            'tu_active' => 1,
            'tu_taken' =>0
        ]);

        TeamUser::factory()->create([
            'tu_user'=>$user->id,
            'tu_division'=>$division2->division_id,
            'tu_team'=>$teamLigue2->team_id,
            'tu_power'=>50,
            'tu_year' =>Date('Y'),
            'tu_active' => 1,
            'tu_taken' =>0
        ]);


        FootballMatch::factory()->createMany([
            ['fm_first_club'=>$myTeam->team_id,'fm_second_club'=> $teamLigue1->team_id,
                'fm_user'=>$user->id,'fm_date'=> new DateTime('2031-10-10 00:00:00'),
                'fm_division'=>$division->division_id],
            ['fm_first_club'=>$myTeam->team_id,'fm_second_club'=> $teamLigue1->team_id,
                'fm_user'=>$user->id,'fm_date'=> (new \Carbon\Carbon())->addMinute(),
                'fm_division'=>$division->division_id],
            ['fm_first_club'=> $teamLigue2->team_id,'fm_second_club'=> $teamLigue2->team_id,
                'fm_user'=> $user->id,'fm_date'=> new DateTime(),
                'fm_division'=> $division2->division_id],
        ]);

        $this->getJson("/api/fm/$user->id/$myTeam->team_id/".Date('Y')."/next-match")
            ->assertStatus(200)
        ->assertJson(['fm_second_club' => $teamLigue1->team_id]);
    }
}
