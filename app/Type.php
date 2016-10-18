<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'lotto', 'draw_day', 'winning_numbers','supplementary_numbers','max_number'
    ];
    
    
    public function results(){
        //** 
        return $this->hasMany('App\Result');
        
    }
}
