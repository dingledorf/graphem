<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    protected $fillable = ['name', 'side', 'hp', 'attack', 'special_ability'];
    protected $guarded = ['id'];

    public function teams()
    {
        return $this->belongsToMany('App\Models\Team');
    }

    public function strength()
    {
        return $this->hp + $this->attack;
    }
}
