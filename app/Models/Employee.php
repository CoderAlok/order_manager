<?php

namespace App\Models;

use App\Models\City as Cities;
use App\Models\State as States;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'tbl_employees';

    protected $primaryKey = 'emp_id';

    public function get_city()
    {
        return $this->belongsTo(Cities::class, 'city', 'city_id');
    }

    public function get_state()
    {
        return $this->belongsTo(States::class, 'state', 'state_id');
    }

    public function getCity()
    {
        return $this->hasOne(State::class);
    }

}
