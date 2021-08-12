<?php


namespace App\Http\Controllers;

use App\Models\FootballMatch;
use App\Models\Team;
use App\Models\TeamUser;
use App\Models\User;
use App\Models\UserDivision;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Nette\Utils\DateTime;

class TeamUserController extends Controller
{
    public function create(Request $request){
//         List division et chaque division seul
        TeamUser::create($request->all());
        UserDivision::create(['ud_user'=>$request->tu_user,'ud_team'=>$request->tu_team,'ud_active'=>1]);
//         delete old tu_active if exist a faire
//         add all teams to team_user
        $this->createAllTeamsOfMyDivision($request);
        $user = User::where('id',$request->tu_user)->get();

        // selected all teams of my division and prepared a good array
        $listAllMatch = $this->createArrayToListAllMAtch($request,$user);

        $this->createAllFootballMatch($listAllMatch);
    }

    public function createAllTeamsOfMyDivision(Request $request){
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
    }

    public function createArrayToListAllMAtch(Request $request,Collection $user){
        $teams = TeamUser::where('tu_user',$request->tu_user)
            ->where('tu_division',1)
            ->where('tu_year',$user->first()->year_in_progress)
            ->with('team')
            ->get();
        $listMatchByTeam = [];
        foreach ($teams as $team) {
            $listMatchByTeam[$team->team->team_name] = [$teams];
        }
        return $listMatchByTeam;
    }

    public function createAllFootballMatch($listAllMAtch): void{
        $i = 0;
        foreach ($listAllMAtch as $key => $item){
            foreach ($item[0] as $team){
                if($team['team']['team_name'] == $key) {
                    $firstTeamId = $team['team']['team_id'];
                    $i = 2;
                    foreach ($item[0] as $teamToCreate){
                        if($teamToCreate['tu_team'] != $firstTeamId){
                            $match = FootballMatch::create(
                                ['fm_first_club'=>$firstTeamId,
                                    'fm_second_club'=> $teamToCreate['tu_team'],
                                    'fm_user' => $teamToCreate['tu_user'],
                                    'fm_date' => (new Carbon())->subHours($i)
                                        ->format('Y-m-d H:i:s'),
                                    'fm_year'=>$teamToCreate['tu_year']
                                ]
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
