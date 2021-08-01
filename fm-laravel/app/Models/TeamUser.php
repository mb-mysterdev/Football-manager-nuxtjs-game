<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class TeamUser extends Model
{
    protected $primaryKey = 'team_user_id';
    protected $table = 'team_user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     **/
    protected $fillable = [
        'team_user_id','user_id', 'team_id','team_user_budget','team_user_power'
    ];
}
