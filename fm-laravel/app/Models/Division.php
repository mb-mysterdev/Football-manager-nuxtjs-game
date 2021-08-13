<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    protected $table = 'divisions';
    protected $primaryKey = 'division_id';

    protected $fillable = ['division_name','division_country'];
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
        return $this->hasMany(TeamUser::class,'tu_division','division_id')
//            ->orderBy('tu_ranking', 'asc')
        ->orderBy('tu_pts', 'desc')
            ->orderBy('tu_db', 'desc')
            ->with('team');
    }

    public function country()
    {
        return $this->belongsTo(Country::class,'country_id','country_division');
    }
}
