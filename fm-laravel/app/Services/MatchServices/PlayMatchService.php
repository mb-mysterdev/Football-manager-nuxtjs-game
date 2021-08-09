<?php

namespace App\Services\MatchServices;

use App\Models\FootballMatch;
use App\Models\Team;
use App\Models\TeamUser;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class PlayMatchService
{
    private Collection $teams;

    public function __construct(Collection $teams)
    {
        $this->teams = $teams;
    }

    public function playMatch(){
        foreach ($this->teams as $team){
            if($this->compareEligibilityMatch($team)) {
                $this->comparePowerTeam($team);
            }
        }
        return true;
    }

    private function comparePowerTeam(FootballMatch $team){
        $tuFirstTeam = TeamUser::where('tu_team',$team['fm_first_club'])->get()->first();
        $tuSecondTeam = TeamUser::where('tu_team',$team['fm_second_club'])->get()->first();
        $tuFirstTeam->update(['tu_j'=>1]);
        $tuSecondTeam->update(['tu_j'=>1]);

        $allStateFirstTeam['tu_j'] = 1;
        $allStateSecondTeam['tu_j'] = 1;
        if($team['firstTeam']->teamUser['tu_power'] > $team['secondTeam']->teamUser['tu_power']){
            $teamFirstResult = $this->getRandomButs($team['firstTeam']->teamUser['tu_power']);
            $teamSecondResult = $this->getRandomButs($team['secondTeam']->teamUser['tu_power']);
        }else if($team['firstTeam']->teamUser['tu_power'] < $team['secondTeam']->teamUser['tu_power']) {
            $teamFirstResult = $this->getRandomButs($team['firstTeam']->teamUser['tu_power']);
            $teamSecondResult = $this->getRandomButs($team['secondTeam']->teamUser['tu_power']);
        }else {
            $teamFirstResult = $this->getRandomButs($team['firstTeam']->teamUser['tu_power']);
            $teamSecondResult = $this->getRandomButs($team['secondTeam']->teamUser['tu_power']);
        }

        $team->update(['fm_result_fc' => $teamFirstResult,'fm_result_sc' => $teamSecondResult]);

        if($teamFirstResult < $teamSecondResult){
            $team->update(['fm_winner' => 'second_club']);
            $allStateSecondTeam['tu_p'] = 0;
            $allStateSecondTeam['tu_pts'] = 3;
            $allStateSecondTeam['tu_g'] = 1;
            $allStateSecondTeam['tu_n'] = 0;
            $allStateSecondTeam['tu_bp'] = $teamSecondResult;
            $allStateSecondTeam['tu_bc'] = $teamFirstResult;

            $allStateFirstTeam['tu_p'] = 1;
            $allStateFirstTeam['tu_pts'] = 0;
            $allStateFirstTeam['tu_g'] = 0;
            $allStateFirstTeam['tu_n'] = 0;
            $allStateFirstTeam['tu_bp'] = $teamFirstResult;
            $allStateFirstTeam['tu_bc'] = $teamSecondResult;
        }
        if($teamFirstResult > $teamSecondResult) {
            $team->update(['fm_winner' => 'first_club']);
            $allStateFirstTeam['tu_g'] = 1;
            $allStateFirstTeam['tu_pts'] = 3;
            $allStateFirstTeam['tu_p'] = 0;
            $allStateFirstTeam['tu_n'] = 0;
            $allStateFirstTeam['tu_bp'] = $teamFirstResult;
            $allStateFirstTeam['tu_bc'] = $teamSecondResult;

            $allStateSecondTeam['tu_p'] = 1;
            $allStateSecondTeam['tu_pts'] = 0;
            $allStateSecondTeam['tu_g'] = 0;
            $allStateSecondTeam['tu_n'] = 0;
            $allStateSecondTeam['tu_bp'] = $teamSecondResult;
            $allStateSecondTeam['tu_bc'] = $teamFirstResult;
        }
        if($teamFirstResult == $teamSecondResult) {
            $team->update(['fm_winner' => 'equality']);
            $allStateFirstTeam['tu_n'] = 1;
            $allStateFirstTeam['tu_pts'] = 1;
            $allStateFirstTeam['tu_p'] = 0;
            $allStateFirstTeam['tu_g'] = 0;
            $allStateFirstTeam['tu_bp'] = $teamFirstResult;
            $allStateFirstTeam['tu_bc'] = $teamSecondResult;

            $allStateSecondTeam['tu_bp'] = $teamSecondResult;
            $allStateSecondTeam['tu_bc'] = $teamFirstResult;
            $allStateSecondTeam['tu_pts'] = 1;
            $allStateSecondTeam['tu_p'] = 0;
            $allStateSecondTeam['tu_g'] = 0;
            $allStateSecondTeam['tu_n'] = 1;
        }
        $allStateFirstTeam['tu_db'] = $allStateFirstTeam['tu_bp'] - $allStateFirstTeam['tu_bc'];
        $allStateSecondTeam['tu_db'] = $allStateSecondTeam['tu_bp'] - $allStateSecondTeam['tu_bc'];

        // sum old data to new data
        $allStateFirstTeam['tu_j'] = $tuFirstTeam['tu_j'] + $allStateFirstTeam['tu_j'];
        $allStateFirstTeam['tu_n'] = $tuFirstTeam['tu_n'] + $allStateFirstTeam['tu_n'];
        $allStateFirstTeam['tu_pts'] = $tuFirstTeam['tu_pts'] + $allStateFirstTeam['tu_pts'];
        $allStateFirstTeam['tu_p'] = $tuFirstTeam['tu_p'] + $allStateFirstTeam['tu_p'];
        $allStateFirstTeam['tu_g'] = $tuFirstTeam['tu_g'] + $allStateFirstTeam['tu_g'];
        $allStateFirstTeam['tu_bp'] = $tuFirstTeam['tu_bp'] + $allStateFirstTeam['tu_bp'];
        $allStateFirstTeam['tu_bc'] = $tuFirstTeam['tu_bc'] + $allStateFirstTeam['tu_bc'];
        $allStateFirstTeam['tu_db'] = $tuFirstTeam['tu_db'] + $allStateFirstTeam['tu_db'];

        $allStateSecondTeam['tu_j'] = $tuSecondTeam['tu_j'] + $allStateSecondTeam['tu_j'];
        $allStateSecondTeam['tu_n'] = $tuSecondTeam['tu_n'] + $allStateSecondTeam['tu_n'];
        $allStateSecondTeam['tu_pts'] = $tuSecondTeam['tu_pts'] + $allStateSecondTeam['tu_pts'];
        $allStateSecondTeam['tu_p'] = $tuSecondTeam['tu_p'] + $allStateSecondTeam['tu_p'];
        $allStateSecondTeam['tu_g'] = $tuSecondTeam['tu_g'] + $allStateSecondTeam['tu_g'];
        $allStateSecondTeam['tu_bp'] = $tuSecondTeam['tu_bp'] + $allStateSecondTeam['tu_bp'];
        $allStateSecondTeam['tu_bc'] = $tuSecondTeam['tu_bc'] + $allStateSecondTeam['tu_bc'];
        $allStateSecondTeam['tu_db'] = $tuSecondTeam['tu_db'] + $allStateSecondTeam['tu_db'];

        $tuFirstTeam->update($allStateFirstTeam);
        $tuSecondTeam->update($allStateSecondTeam);
    }

    private function getRandomButs(int $teamPower){
        switch ($teamPower) {
            case $teamPower >= 98:
                $randomButs = rand(0,8);
                break;
            case $teamPower >= 96:
                $randomButs = rand(0,7);
                break;
            case $teamPower >= 92:
                $randomButs = rand(0,6);
                break;
            case $teamPower >= 88:
                $randomButs = rand(0,5);
                break;
            case $teamPower >= 75:
                $randomButs = rand(0,4);
                break;
            case $teamPower >= 60:
                $randomButs = rand(0,3);
                break;
            case $teamPower >= 40:
                $randomButs = rand(0,2);
                break;
            default:
                $randomButs = rand(0,1);
        }
        return $randomButs;
    }

    private function compareEligibilityMatch(FootballMatch $team){
        return $team['fm_date'] <= (new Carbon())->format('Y-m-d H:i:s') && is_null($team['fm_winner']);
    }
}
