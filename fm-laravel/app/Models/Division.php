<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    protected $table = 'divisions';
    protected $primaryKey = 'division_id';

    protected $fillable = ['division_name'];
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
     * Get the teams.
     */
    public function defaultTeams()
    {
        return $this->hasMany(Team::class,'team_division','division_id');
    }

    /**
     * Get the teams.
     */
    public function teams()
    {
        return $this->hasMany(TeamUser::class,'tu_division','division_id')->with('team');
    }
}
