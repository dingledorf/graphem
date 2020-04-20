<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['side'];
    protected $guarded = ['id'];


    public function heroes()
    {
        return $this->belongsToMany('App\Models\Hero');
    }

    public function totalStrength()
    {
        return array_reduce($this->heroes->all(), function($sum, Hero $i) {
            return $sum + $i->strength();
        }, 0);
    }
}
