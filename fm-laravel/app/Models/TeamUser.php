<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class TeamUser extends Pivot
{
    protected $primaryKey = 'tu_id';
    protected $table = 'team_user';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     **/
    protected $fillable = [
        'tu_id','tu_user', 'tu_team','tu_budget','tu_power','tu_division','tu_taken','tu_active','tu_pts',
        'tu_j','tu_g','tu_n','tu_p','tu_bp','tu_bc','tu_db','tu_ranking','tu_year'
    ];

    public function team(){
        return $this->hasOne(Team::class,'team_id','tu_team')->with('division');
    }
}
