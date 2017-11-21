<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecialOffer extends Model
{
  
    public function vouchers()
    {
        return $this->hasMany('App\Voucher');
    }

}   
