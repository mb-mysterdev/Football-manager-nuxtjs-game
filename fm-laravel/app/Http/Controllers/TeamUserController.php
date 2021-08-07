<?php


namespace App\Http\Controllers;

use App\Models\FootballMatch;
use App\Models\Team;
use App\Models\TeamUser;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Nette\Utils\DateTime;

class TeamUserController extends Controller
{
    public function create(Request $request){
//         List division et chaque division seul
        TeamUser::create($request->all());
//         delete old tu_active if exist
//         add all teams to team_user
        $defaultTeams = Team::where('team_id','!=',$request->tu_team)
            ->where('team_division',1)->get();
        foreach ($defaultTeams as $team){
            TeamUser::create([
                'tu_team' => $team->team_id,
                'tu_user' => $request->tu_user,
                'tu_budget' => $team->team_budget,
                'tu_power' => $team->team_power,
                'tu_division' => $team->team_division,
                'tu_taken' => 0,
                'tu_active' => 0
            ]);
        }
        $user = User::where('id',$request->tu_user)->get();

        $teams = TeamUser::where('tu_user',$request->tu_user)
            ->where('tu_division',1)
            ->where('tu_year',$user->first()->year_in_progress)
            ->with('team')
            ->get();
        $listMatchByTeam = [];
        foreach ($teams as $team) {
            $listMatchByTeam[$team->team->team_name] = [$teams];
        }

        $i = 0;
        foreach ($listMatchByTeam as $key => $item){
            foreach ($item[0] as $team){
                if($team['team']['team_name'] == $key) {
                    $firstTeamId = $team['team']['team_id'];
                    $i = 2;
                    foreach ($item[0] as $teamToCreate){
                        if($teamToCreate['tu_team'] != $firstTeamId){
                            FootballMatch::create(
                                ['fm_first_club'=>$firstTeamId,
                                    'fm_second_club'=> $teamToCreate['tu_team'],
                                    'fm_user' => $teamToCreate['tu_user'],
                                    'fm_date' => (new Carbon())->addHours($i)
                                        ->format('Y-m-d H:i:s'),
                                    'fm_year'=>$teamToCreate['tu_year']]
                            );
                        }
                        $i++;
                    }
                }
            }

            $i++;
        }


    }
}
