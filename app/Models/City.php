<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \App\Models\State as States;

class City extends Model
{
    //
    use SoftDeletes;
    protected $table = 'tbl_city';

    // Get state details
    public function getState(){
        return $this->hasOne(States::class , 'state_id', 'state_id');
    }
}
