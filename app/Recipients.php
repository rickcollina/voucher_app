<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipients extends Model
{
    public function vouchers()
    {
        return $this->hasMany('App\Voucher');
    }
}
