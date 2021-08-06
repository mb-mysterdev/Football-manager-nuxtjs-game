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
        'tu_id','tu_user', 'tu_team','tu_budget','tu_power','tu_division'
    ];

    public function team(){
        return $this->belongsTo(Team::class,'tu_team','team_id');
    }
}
