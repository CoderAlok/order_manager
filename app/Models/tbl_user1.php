<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tbl_user1 extends Model
{
    //
    // protected $primaryKey = 'id';

    protected $table = 'tbl_users1';

    protected $fillable = ['email', 'phone', 'updated_at'];

    // protected function setKeysForSaveQuery(Builder $query)
    // {
    //     $query->where($this->getKeyName(), '=', $this->getKeyForSaveQuery());
    //     return $query;
    // }
}
