<?php

namespace App;

use App\Helpers;
use Illuminate\Database\Eloquent\Model;

class Result extends Model {

    protected $fillable = [
        'draw_date', 'draw_number', 'type_id'
        , 'wn1'
        , 'wn2'
        , 'wn3'
        , 'wn4'
        , 'wn5'
        , 'wn6'
        , 'wn7'
        , 'wn8'
        , 'wn9'
        , 'wn10'
        , 'sn1'
        , 'sn2'
        , 'sn3'
        , 'sn4'
        , 'sn5'
    ];

    public function type() {
        return $this->belongsTo('App\Type');
    }

    public function wn($i) {
        /*
          $result = [];
          for ($i = 1; $i <= $this->type->winning_numbers; $i++) {
          array_push($result, $this->wn.$i);
          }
         */
        $result = [
            $this->wn1,
            $this->wn2,
            $this->wn3,
            $this->wn4,
            $this->wn5,
            $this->wn6,
            $this->wn7,
            $this->wn8,
            $this->wn9,
            $this->wn10
        ];
        usort($result, 'cmp');

        //dd($result);
        return $result[$i - 1];
    }

    public function sn($i) {
        $result = [
            $this->sn1,
            $this->sn2,
            $this->sn3,
            $this->sn4,
            $this->sn5
        ];
        usort($result, 'cmp');

        //dd($result);
        return $result[$i - 1];
    }

}
