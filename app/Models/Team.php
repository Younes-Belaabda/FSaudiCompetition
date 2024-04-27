<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid' ,
        'team_eID' ,
        'team_category',
        'team_administration',
        'team_name',
        'school_name',
        'coach_name',
        'coach_phone',
        'coach_eID',
        'students',
    ];

    public function presences(){
        return $this->hasMany(Presence::class);
    }
}
