<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

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

    public function teamUser(){
        return $this->hasOne(TeamUser::class,'tu_team','team_id');
    }

    public function division()
    {
        return $this->belongsTo(Division::class,'team_division','division_id');
    }
}
