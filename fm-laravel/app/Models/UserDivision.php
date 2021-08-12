<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDivision extends Model
{
    use HasFactory;

    protected $primaryKey = 'ud_id';

    protected $fillable = ['ud_id','ud_user','ud_division','ud_active'];

    protected $table = 'user_division';
}
