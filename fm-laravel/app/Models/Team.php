<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $primaryKey = 'team_id';
    protected $table = 'teams';

    protected $fillable= ['team_name'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function user(){
        return $this->belongsToMany(User::class,null,'tu_team','tu_user')->using(TeamUser::class);
    }

    public function division(){
        return $this->belongsToMany(Division::class,null,'du_team','du_user');
    }
}
