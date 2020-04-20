<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroTeam extends Model
{
    protected $table = 'hero_team';
    protected $fillable = ['hero_id', 'team_id'];
    public $timestamps = false;

    public function hero() {
        return $this->belongsTo(\App\Models\Hero::class, 'hero_id', 'id');
    }

    public function team() {
        return $this->belongsTo(\App\Models\Team::class, 'team_id', 'id');
    }
}
