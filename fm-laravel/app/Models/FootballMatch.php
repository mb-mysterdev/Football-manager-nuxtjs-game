<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FootballMatch extends Model
{
    use HasFactory;

    protected $primaryKey = 'fm_id';
    protected $table = 'football_matches';

    protected $fillable = ['fm_first_club','fm_second_club','fm_user','fm_result_fc','fm_result_sc',
        'fm_date','fm_year','fm_winner','fm_division'];

    public function firstTeam(){
        return $this->hasOne(Team::class,'team_id','fm_first_club')
            ->with('teamUser');
    }

    public function secondTeam(){
        return $this->hasOne(Team::class,'team_id','fm_second_club')
            ->with('teamUser');
    }
}
