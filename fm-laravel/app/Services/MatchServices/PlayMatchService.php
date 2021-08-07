<?php

namespace App\Services\MatchServices;

use App\Models\FootballMatch;
use App\Models\Team;
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
            $teamFirstResult = 0;
            $teamSecondResult = 0;
            if($this->compareEligibilityMatch($team)) {
                $this->comparePowerTeam($team['firstTeam'],$team['secondTeam'],$team);
            }
        }
        return true;
    }

    private function comparePowerTeam(Team $firstTeam,Team $secondTeam,FootballMatch $team){
        if($firstTeam->teamUser['tu_power'] > $secondTeam->teamUser['tu_power']){
            $teamFirstResult = $this->getRandomButs($firstTeam->teamUser['tu_power']);
            $teamSecondResult = $this->getRandomButs($secondTeam->teamUser['tu_power']);
            $team->update(['fm_result_fc' => $teamFirstResult,'fm_result_sc' => $teamSecondResult]);
        }else if($firstTeam->teamUser['tu_power'] < $secondTeam->teamUser['tu_power']) {
            $teamFirstResult = $this->getRandomButs($firstTeam->teamUser['tu_power']);
            $teamSecondResult = $this->getRandomButs($secondTeam->teamUser['tu_power']);
            $team->update(['fm_result_sc' => $teamSecondResult,'fm_result_fc' => $teamFirstResult]);
        }else {
            $teamFirstResult = $this->getRandomButs($firstTeam->teamUser['tu_power']);
            $teamSecondResult = $this->getRandomButs($secondTeam->teamUser['tu_power']);
            $team->update(['fm_result_fc' => $teamFirstResult,'fm_result_sc' => $teamSecondResult]);
        }

        if($teamFirstResult < $teamSecondResult){
            $team->update(['fm_winner' => 'second_club']);
        }
        if($teamFirstResult > $teamSecondResult) {
            $team->update(['fm_winner' => 'first_club']);
        }
        if($teamFirstResult == $teamSecondResult) {
            $team->update(['fm_winner' => 'equality']);
        }
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
            case $teamPower >= 80:
                $randomButs = rand(0,4);
                break;
            case $teamPower >= 65:
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
        return $team['fm_date'] <= (new Carbon())->format('Y-m-d H:i:s');
    }
}
