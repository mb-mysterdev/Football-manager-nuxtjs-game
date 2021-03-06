<?php


namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\FootballMatch;
use App\Models\Team;
use App\Models\TeamUser;
use App\Models\User;
use App\Models\UserDivision;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class TeamUserController extends Controller
{
    public function create(Request $request){
//         List division et chaque division seul
        TeamUser::create($request->all());
        UserDivision::create(['ud_user'=>$request->tu_user,'ud_division'=>$request->tu_division,'ud_active'=>1]);
//         delete old tu_active if exist a faire
//         add all teams to team_user
        $this->addAllTeamsToTeamUser($request);
        $user = User::where('id',$request->tu_user)->get();

        // selected all teams of my division and prepared a good array
        $listAllMatch = $this->createArrayToListAllMAtch($request,$user);
        $this->createAllFootballMatch($listAllMatch);
    }

    public function addAllTeamsToTeamUser(Request $request){
        $defaultTeams = Team::where('team_id','!=',$request->tu_team)
//            ->where('team_division',1)
            ->get();
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
//        $divisions = Division::all();
//        $teams = [];
//        foreach ($divisions as $division){
//            $teams[$division->division_name] = TeamUser::where('tu_user',$request->tu_user)
//                ->where('tu_division',$division->division_id)
//                ->where('tu_year',$user->first()->year_in_progress)
//                ->with('team')
//                ->get();
//        }
//
//        $listMatchByTeam = [];
//        foreach ($teams as $division => $team) {
//            foreach ($team as $value){
//                $listMatchByTeam[$division][$value->team->team_name] = [$teams[$division]];
//            }
//        }
//        return $listMatchByTeam;
        $teams = TeamUser::where('tu_user',$request->tu_user)
            ->where('tu_year',$user->first()->year_in_progress)
            ->with('team')
            ->get();
        $listMatchByTeam = [];
        foreach ($teams as $team) {
            $listMatchByTeam[$team->team->team_name] = [$teams];
        }
        return $listMatchByTeam;
    }

    public function createAllFootballMatch($listOfDivisionWithTeams): void{
        $i = 0;
        foreach ($listOfDivisionWithTeams as $key => $item){
            foreach ($item[0] as $team){
                if($team['team']['team_name'] == $key) {
                    $firstTeamId = $team['team']['team_id'];
                    $i = 30;
                    foreach ($item[0] as $teamToCreate){
                        if($teamToCreate['tu_team'] != $firstTeamId && $teamToCreate['tu_division'] === $team['team']['team_division']){
                            FootballMatch::create(
                                ['fm_first_club'=>$firstTeamId,
                                    'fm_second_club'=> $teamToCreate['tu_team'],
                                    'fm_user' => $teamToCreate['tu_user'],
                                    'fm_date' => (new Carbon())->addMinutes($i)->utc()
                                        ->format('Y-m-d H:i:s'),
                                    'fm_year'=>$teamToCreate['tu_year'],
                                    'fm_division' => $teamToCreate['tu_division']
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
