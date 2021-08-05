<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DivisionUser extends Model
{
    use HasFactory;

    protected $table = 'division_user';

    protected $primaryKey = 'du_id';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function division(){
        return $this->hasMany(Division::class,'division_id','du_division')->get();
    }
}
